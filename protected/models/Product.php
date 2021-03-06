<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $name
 * @property double $price
 * @property string $image
 * @property integer $created
 * @property integer $category_id
 * @property string $description
 */
class Product extends CActiveRecord implements IECartPosition
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, price, manufacturer_id, image, category_id, description, meta_keywords, meta_descriptions', 'required'),
			array('created, category_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('name', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, price, image, created, category_id, description', 'safe', 'on'=>'search'),
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
                    'category' => array(self::BELONGS_TO,'category', 'category_id'),
                    'manufacturer' => array(self::BELONGS_TO,'manufacturer', 'manufacturer_id'),
                    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
                        'manufacturer_id' => 'Производитель',
			'name' => 'Название',
			'price' => 'Цена',
			'image' => 'Изображение',
			'created' => 'Дата добавления',
			'category_id' => 'Категория',
			'description' => 'Описание',
                        'meta_keywords' => 'Meta Keywords',
                        'meta_descriptions' => 'Meta Descriptions',
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
            	$criteria->compare('name',$this->name,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('description',$this->description,true);
                $criteria->compare('meta_keywords',$this->meta_keywords,true);
                $criteria->compare('meta_descriptions',$this->meta_descriptions,true);
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>false,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
         public static function all(){
            
            
            return CHtml::listData(self::model()->findAll(),'id','title');
        }
        
         public function beforeSave() {
            if($this->isNewRecord)
                $this->created = time ();
            
            return parent::beforeSave();
        }

    public function getId() {
        return 'Product'.$this->id;
    }

    public function getPrice() {
        return $this->price;
    }
    public function tovarName() {
        $product = Product::model()->findByPk($_POST['tovarid']);
    }

}
