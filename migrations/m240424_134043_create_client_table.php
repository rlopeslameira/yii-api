<?php

use yii\db\Migration;

class m240424_134043_create_client_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(120)->notNull(),
            'cpf' => $this->string(14)->unique()->notNull(),
            'zip_code' => $this->string(8)->notNull(),
            'address' => $this->string(120)->notNull(),
            'number' => $this->string(20)->notNull(),
            'city' => $this->string(60)->notNull(),
            'state' => $this->string(2)->notNull(),
            'complement' => $this->string(60),
            'photo' => $this->string(),
            'gender' => $this->char(1)->notNull(),
        ]);

        $this->createIndex(
            'idx-client-cpf',
            '{{%client}}',
            'cpf'
        );
    }

    public function safeDown()
    {
        $this->dropIndex(
            'idx-client-cpf',
            '{{%client}}'
        );

        $this->dropTable('{{%client}}');
    }
}

