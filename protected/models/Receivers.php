<?php

/**
 * This is the model class for table "tbl_receivers".
 *
 * The followings are the available columns in table 'tbl_receivers':
 * @property integer $id
 * @property integer $sender_id
 * @property string $receiver_name
 * @property string $receiver_phone_no
 * @property integer $amount
 * @property integer $charges
 * @property string $sender_name
 * @property string $sender_phone_no
 * @property string $sender_country
 * @property string $receiver_country
 * @property string $create_time
 * @property integer $is_active
 * @property integer $is_deleted
 *
 * The followings are the available model relations:
 * @property Senders $sender
 */
class Receivers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_receivers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sender_id, receiver_name, receiver_phone_no, amount, charges, sender_name, sender_phone_no, sender_country, receiver_country', 'required'),
			array('sender_id, amount, charges, is_active, is_deleted', 'numerical', 'integerOnly'=>true),
			array('receiver_name, receiver_phone_no, sender_name, sender_phone_no, sender_country, receiver_country', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sender_id, receiver_name, receiver_phone_no, amount, charges, sender_name, sender_phone_no, sender_country, receiver_country, create_time, is_active, is_deleted', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'sender' => array(self::BELONGS_TO, 'Senders', 'sender_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sender_id' => 'Sender',
			'receiver_name' => 'Receiver Name',
			'receiver_phone_no' => 'Receiver Phone No',
			'amount' => 'Amount',
			'charges' => 'Charges',
			'sender_name' => 'Sender Name',
			'sender_phone_no' => 'Sender Phone No',
			'sender_country' => 'Sender Country',
			'receiver_country' => 'Receiver Country',
			'create_time' => 'Create Time',
			'is_active' => 'Is Active',
			'is_deleted' => 'Is Deleted',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('sender_id',$this->sender_id);
		$criteria->compare('receiver_name',$this->receiver_name,true);
		$criteria->compare('receiver_phone_no',$this->receiver_phone_no,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('charges',$this->charges);
		$criteria->compare('sender_name',$this->sender_name,true);
		$criteria->compare('sender_phone_no',$this->sender_phone_no,true);
		$criteria->compare('sender_country',$this->sender_country,true);
		$criteria->compare('receiver_country',$this->receiver_country,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('is_deleted',$this->is_deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Receivers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
