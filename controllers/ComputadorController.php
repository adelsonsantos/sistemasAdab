<?php

namespace app\controllers;

use Yii;
use app\models\PortalComputador;
use app\models\ComputadorSearch;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ComputadorController implements the CRUD actions for PortalComputador model.
 */
class ComputadorController extends ActiveController
{
    public $modelClass = 'app\models\PortalComputador';
}
