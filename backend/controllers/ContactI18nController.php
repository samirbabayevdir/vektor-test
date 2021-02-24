<?php

namespace backend\controllers;

use backend\base\BackController;
use Yii;
use common\models\ContactI18n;
use backend\models\search\ContactI18nSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContactI18nController implements the CRUD actions for ContactI18n model.
 */
class ContactI18nController extends BackController
{
    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }

    /**
     * Lists all ContactI18n models.
     * @return mixed
     */

    public function actionLang()
    {
        $lang = Yii::$app->request->get('lang');
        $id   = Yii::$app->request->get('id');

        $model = ContactI18n::find()->andWhere(['fk_ref' => $id, 'lang' => $lang])->one();

        if (empty($model)) {
            $model = new ContactI18n();

            $model->lang = $lang;
            $model->fk_ref = $id;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['/contact/update', 'id' => $id]);
            }

            return $this->render('create', [
                'model' => $model,
                'lang' => $lang
            ]);
        }



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/contact/update', 'id' => $id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        $searchModel = new ContactI18nSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ContactI18n model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ContactI18n model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ContactI18n();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ContactI18n model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ContactI18n model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ContactI18n model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ContactI18n the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ContactI18n::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
