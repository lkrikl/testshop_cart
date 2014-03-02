<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $id
 * @property string $content
 * @property integer $page_id
 * @property integer $created
 * @property integer $user_id
 * @property string $quest
 * @property integer $status
 */
class Comment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content',  'required'),
			array('page_id, created, user_id, status', 'numerical', 'integerOnly'=>true),
			array('quest', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
                //        array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('id, content, page_id, created, user_id, quest, status', 'safe', 'on'=>'search'),
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
                    'user' => array(self::BELONGS_TO,'user','user_id'),
                    'page' => array(self::BELONGS_TO,'page','page_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => 'Комментарий: ',
			'page_id' => 'Страницы',
			'created' => '>>',
			'user_id' => '#',
			'quest' => 'Гость',
			'status' => 'Статус',
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('page_id',$this->page_id);
		$criteria->compare('created',$this->created);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('quest',$this->quest,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave() {
            if($this->isNewRecord);
                $this->created = time();
                
                if(!Yii::app()->user->isGuest)
                    $this->user_id = Yii::app ()->user->id;
            
            return parent::beforeSave();
        }
        
         public static function all($page_id) {
             
                $criteria=new CDbCriteria;
		$criteria->compare('page_id',$page_id);
		
                $criteria->compare('status',0);
                $criteria->order = 'created DESC';
                    
            return new CActiveDataProvider('Comment', array(
			'criteria'=>$criteria,
		));
         }
}
