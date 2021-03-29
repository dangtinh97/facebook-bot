<?php

namespace App\Controllers\Cron;

use App\Controllers\BaseController;
use App\Libraries\Facebook;
use App\Libraries\Image;
use App\Models\AccountModel;
use App\Models\DataAccountModel;
use App\Models\UserModel;
use App\Models\LogCommentModel;

class CommentGroupApi extends BaseController
{
    protected $userModel;
    protected $accountModel;
    protected $configDataModel;
    protected $user;
    protected $logCommentModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->accountModel = new AccountModel();
        $this->configDataModel = new DataAccountModel();
        $this->logCommentModel = new LogCommentModel();

        $user = $this->userModel->where([
            'token' => $this->getParamString('token'),
        ])->first();
        if (is_null($user)) die($this->responseError(401, 'truy cập không hợp lệ'));

        $this->user = $user;
    }

    public function init()
    {

        Image::getUrlImage('tinh');
        die();

        $findAccountFree = $this->accountModel->accountFree((int)$this->user['id'], 'comment_group');
        if ($findAccountFree['status'] != 200) return json_encode($findAccountFree);
        $dataAccountFree = $findAccountFree['data'];
        $cookie = $dataAccountFree['cookie'];
        $accountId = $dataAccountFree['acc_id'];
        $accountMe = Facebook::infoByCookie($cookie);
        if (count($accountMe) == 0) {
            $this->accountModel->update($accountId, ['status' => 'DIE']);
            return $this->responseError(500, 'Cookie không hợp lệ', [
                'account_id' => $accountId
            ]);
        }
        $token = $accountMe['token'];
        $dataMeSetup = $this->configDataModel->where([
            'account_id' => $accountId,
            'type' => 'comment_group'
        ])->first();
        if (is_null($dataMeSetup)) return $this->responseError(201, 'Chưa cài đặt nội dung', ['account_id' => $accountId]);
        $dataSetUp = json_decode($dataMeSetup['data'], true);

        $groups = explode("\r\n", $dataSetUp['group_ids']);
        $contents = explode( "|",$dataSetUp['content']);
        $idGroup = $groups[array_rand($groups)];
        $postsInGroup = Facebook::searchPostGroup($idGroup, $cookie);
        if (count($postsInGroup) == 0) return $this->responseError(201, 'Không tìm thấy bài viết', [
            'group' => $postsInGroup
        ]);
        $idPost = $this->logCommentModel->findIdNotInLog($postsInGroup, 'comment_group', $accountId);
        if (is_null($idPost)) return $this->responseError(201, 'Các bài viết tìm thấy đã được comment', [
            'group' => $postsInGroup
        ]);
        $poster = Facebook::getNamePoster($idPost, $cookie);
        $urlImage = Image::getUrlImage($poster['name']);
        $content = Facebook::exportString($contents[array_rand($contents)]);
        $result = Facebook::postToken("https://graph.facebook.com/$idPost/comments?method=POST&message=" . urlencode($content) . "&attachment_url=" . urlencode($urlImage) . "&access_token=$token");
        return $this->responseSuccess(200, 'Comment', [
            'id_post' => $idPost,
            'url_post' => "https://facebook.com/$idPost",
            'uid_comment' => $accountMe['uid'],
            'content' => $content,
            'result'=>$result
        ]);
    }


}