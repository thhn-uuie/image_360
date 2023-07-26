<?php

namespace backend\controllers;

use common\models\base\View;
use common\models\search\ViewSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ViewController implements the CRUD actions for View model.
 */
class ViewController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all View models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ViewSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single View model.
     * @param int $id_view Id View
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_view)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_view),
        ]);
    }

    /**
     * Creates a new View model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new View();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_view' => $model->id_view]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing View model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_view Id View
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_view)
    {
        $model = $this->findModel($id_view);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_view' => $model->id_view]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing View model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_view Id View
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_view)
    {
        $this->findModel($id_view)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the View model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_view Id View
     * @return View the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_view)
    {
        if (($model = View::findOne(['id_view' => $id_view])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
