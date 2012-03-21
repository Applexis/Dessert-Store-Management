<?php 

	abstract class RelActiveRecord extends CActiveRecord {

		/**
		 * Need to be override
		 * @return string The Attribute need to be present.
		 */
		public static function getPresentAttribute() {
			return null;
		}

		/**
		 * Description
		 * @param string $attribute 
		 * @return string The label of the attribute.
		 */
		public function getRelationLabel($relName, $relation = true) {
			
			$labels=$this->attributeLabels();
			if(isset($labels[$relName]))
				return $labels[$relName];
			else {
		        $model=$this;

	            $relations=$model->getMetaData()->relations;
	            if(isset($relations[$relName]))
	                $model=CActiveRecord::model($relations[$relName]->className);
	            else
	            	throw CException("The relation or attribute does not exist.");

		        return $model->getAttributeLabel($model->getPresentAttribute());
			}
		}

		/**
		 * Description
		 * @param type $attribute 
		 * @return type
		 */
		public function getAttributeLabel($attribute) {
			return $this->getRelationLabel($attribute);
		}

		/**
		 * Get the present value of the AR
		 * @return type
		 */
		public function __toString(){
			$presentAttribute = $this->getPresentAttribute();

			if (($presentAttribute == null) || ($presentAttribute == array()))
				if ($this->getTableSchema()->primaryKey != null) {
					$presentAttribute = $this->getTableSchema()->primaryKey;
				} else {
					$columnNames = $this->getTableSchema()->getColumnNames();
					$presentAttribute = $columnNames[0];
				}

			return $this->$presentAttribute === null ? '' : (string) $this->$presentAttribute;

		}

		public static function label()
		{
			return get_class($this);
		}


		public static function getPkValue($model) {
			if ($model == null) 
				return null;
			else {
				$key = $model->getPrimaryKey();
				return $key;
			}
		}
	}


 ?>