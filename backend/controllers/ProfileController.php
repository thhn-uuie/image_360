<?php

namespace backend\controllers;

use common\models\Profile;
use Yii;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use common\helper\ImageHelper;


class ProfileController extends \backend\controllers\base\ProfileController
{

    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::class,

                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'actions' => ['view'],
                        'matchCallback' => function ($rule, $action) {
                            $account = $action->controller->findModel(Yii::$app->request->get('id_user'));
                            $account_current = Yii::$app->user->identity;
                            if ($account_current->id_role == 1 || $account->id_user == $account_current->getId()) {
                                return true;
                            }
                            return false;
                        },
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'actions' => ['index', 'delete'],
                        'matchCallback' => function ($rule, $action) {
                            $userRole = Yii::$app->user->identity->id_role;
                            if ($userRole == 1) {
                                return true;
                            }
                        },
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'actions' => ['update'],
                        'matchCallback' => function ($rule, $action) {
                            $userId = Yii::$app->user->identity->getId();
                            if ($userId == Yii::$app->request->get('id_user')) {
                                return true;
                            }
                        },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionCreate()
    {
        $model = new Profile();
        $loadImg = new ImageHelper();
        if ($model->load(Yii::$app->request->post())) {

            $loadImg->loadImgAvatar($model);

            if ($model->save(false)) {
                //Yii::$app->session->addFlash('success', 'Thêm mới thành công');
                return $this->redirect((['view', 'id_user' => $model->id_user]));
            } else {
                //Yii::$app->session->addFlash('danger', 'Thêm mới không thành công');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

        } else {

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     *  mục dích
     * @param $id_user
     * @return string|\yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     *
     * output
     */
    public function actionUpdate($id_user)
    {
        $model = $this->findModel($id_user);
        $old_avatar = $model->avatar;

        if ($model->load(Yii::$app->request->post())) {
            $model->file_image = UploadedFile::getInstance($model, 'file_image');
            if ($model->file_image) {
                $model->file_image->saveAs('../../image/avatars/' . time() . '_' . $model->file_image->name);
                if($model->avatar !== 'no-avatar.jpg') {
                    unlink('../../image/avatars/' . $model->avatar);
                    $model->avatar = time() . '_' . $model->file_image->name;

                } else {
                    $model->avatar = time() . '_' . $model->file_image->name;

                }

            } else {
                $model->file_image = $old_avatar;
            }
            if ($model->save(false)) {
                //Yii::$app->session->addFlash('success', 'Thêm mới thành công');
                return $this->redirect(['view', 'id_user' => $model->id_user]);
            } else {
                //Yii::$app->session->addFlash('danger', 'Thêm mới không thành công');
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionDelete($id_user)
    {
        $model = $this->findModel($id_user);
        $model->delete();
        unlink('../../image/avatars/' . $model->avatar);
        return $this->redirect(['index']);
    }
}
