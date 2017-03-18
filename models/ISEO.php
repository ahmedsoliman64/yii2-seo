<?php

namespace asoliman\yii2\seo\models;

/**
 *
 * @author Ahmed Soliman
 */
interface ISEO {
    
    /**
     * get the page title
     * @return string
     */
    public function getTitle();
    
    /**
     * get the page description tag
     * @return string
     */
    public function getDescription();
    
    /**
     * get the page author tag
     * @return string
     */
    public function getAuthor();
    
    /**
     * get the page Canonical tag
     * @return string
     */
    public function getCanonical();
    
    /**
     * get the page Keywords tag
     * @return string
     */
    public function getKeywords();
    
    /**
     * is Robot index allowed
     * @return boolean
     */
    public function isRobotIndex();
    
    /**
     * is Robot follow allowed
     * @return boolean
     */
    public function isRobotFollow();
}
