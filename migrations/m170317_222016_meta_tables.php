<?php

use yii\db\Schema;
use yii\db\Migration;

class m170317_222016_meta_tables extends Migration
{
    public function up()
    {        
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
                
        $this->createTable('{{%meta}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT',
            'hash' => 'VARCHAR(255) NOT NULL',
            'route' => 'VARCHAR(255) NOT NULL',
            'robots_index' => 'ENUM(\'INDEX\',\'NOINDEX\') NULL',
            'robots_follow' => 'ENUM(\'FOLLOW\',\'NOFOLLOW\') NULL',
            'author' => 'VARCHAR(255) NULL',
            'title' => 'VARCHAR(255) NULL',
            'keywords' => 'TEXT NULL',
            'description' => 'TEXT NULL',
            'canonical' => 'TEXT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            0 => 'PRIMARY KEY (`id`)'
        ], $tableOptions);
        
        $this->createIndex('hash', '{{%meta}}', 'hash', true);                
    }

    public function down()
    {
        $this->dropTable('{{%meta}}');
    }
}
