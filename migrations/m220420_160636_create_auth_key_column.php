<?php

use yii\db\Migration;

/**
 * Class m220420_160636_create_auth_key_column
 */
class m220420_160636_create_auth_key_column extends Migration {

    /**
     * {@inheritdoc}
     */
//    public function safeUp() {}

    /**
     * {@inheritdoc}
     */
//    public function safeDown() {}

    // Use up()/down() to run migration code without a transaction.
    public function up() {
        $this->addColumn('user', 'auth_key', $this->string(60)->notNull()->unique()->after('contact_phone'));
    }

    public function down() {
        $this->dropColumn('user', 'auth_key');
    }

}
