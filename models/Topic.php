<?php

namespace app\models;

/**
 * This is the model class for table "tbl_topic".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $source
 * @property integer $node_id
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $replies_count
 * @property integer $last_reply_user_id
 * @property integer $replied_at
 */
class Topic extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tbl_topic';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title', 'source'], 'required'],
			[['source'], 'string'],
			[['title'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'title' => '标题',
			'content' => '内容',
			'source' => '源',
			'node_id' => '节点',
			'user_id' => 'User ID',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'replies_count' => 'Replies Count',
			'last_reply_user_id' => 'Last Reply User ID',
			'replied_at' => 'Replied At',
		];
	}

	public function getNode()
    {
        return $this->hasOne(Node::className(), ['id' => 'node_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
