<?php
namespace asoliman\yii2\seo;

use Yii;
use yii\base\Component;
use asoliman\yii2\seo\models\ISEO;
use asoliman\yii2\seo\models\Meta;

/** 
 * @author Ahmed Soliman
 */
class SeoManager extends Component {
                   
    private function _checkRoute()
    {
        $route = Yii::$app->request->getPathInfo();	
        $seoPage = Meta::findOne(['hash' => md5($route)]);
	
        if ($seoPage) {
            if(!empty($seoPage->title)) {
                $this->_setTitle($seoPage->title);
            }
            if(!empty($seoPage->keywords)) {
                $this->_setKeyWords($seoPage->keywords);
            }
            if(!empty($seoPage->description)) {
                $this->_setDescription($seoPage->description);
            }
            if(!empty($seoPage->canonical)) {
                $this->_setCanonical($seoPage->canonical);
            }            
            if(!empty($seoPage->author)) {
                $this->_setCanonical($seoPage->author);
            }
        }
        
    }
    
    public function _checkModel(ISEO $model) {
        if(!empty($seoPage->getTitle())) {
            $this->_setTitle($seoPage->getTitle());
        }
        if(!empty($seoPage->getKeywords())) {
            $this->_setKeyWords($seoPage->getKeywords());
        }
        if(!empty($seoPage->getDescription())) {
            $this->_setDescription($seoPage->getDescription());
        }
        if(!empty($seoPage->getCanonical())) {
            $this->_setCanonical($seoPage->getCanonical());
        }            
        if(!empty($seoPage->getAuthor())) {
            $this->_setCanonical($seoPage->getAuthor());
        }
    }
    
    private function _setTitle($titel)
    {
        Yii::$app->view->title = $titel;
    }
    
    private function _setDescription($description)
    {
        Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $description], 'description');
    }
    
    private function _setCanonical($href)
    {
        Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => $href]);
    }
    
    private function _setKeyWords($keywords)
    {
        Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $keywords], 'keywords');
    }
    
    public function setRobots($index = '', $follow = '')
    {
        $v = [];
        if (!empty($index)) {
            $v[] = $index;
        }
        if (!empty($follow)) {
            $v[] = $follow;
        }
        if (!empty($v)) {
            Yii::$app->view->registerMetaTag(['name' => 'robots', 'content' => strtolower(implode(',', $v))], 'robots');
        }        
    }
    
    /**
     * @return mixed
     */
    public function registerRouteMeta() {        
        return $this->_checkRoute();            
    }
    
    public function registerModelMeta(ISEO $model) {
        return $this->_checkModel($model);
    }
    
    
}
