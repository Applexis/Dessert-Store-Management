<?php 
	class RLHtml extends CHtml {
		
		public static function valueEx($model, $attribute = null, $defaultValue = null) {
			if ($attribute === null) {
				if (is_object($model) && is_subclass_of($model, 'RelActiveRecord'))
					return $model->__toString();
				else
					return $defaultValue;
			} else {
				return parent::value($model, $attribute, $defaultValue);
			}
		}

		public static function selectData($value) {
			// If $value is a model or an array of models, turn it into
			// a string or an array of strings with the pk values.
			if ((is_object($value) && is_subclass_of($value, 'GxActiveRecord')) ||
					(is_array($value) && !empty($value) && is_object($value[0]) && is_subclass_of($value[0], 'GxActiveRecord')))
				return GxActiveRecord::extractPkValue($value, true);
			else
				return $value;
		}

		public static function listDataEx($models, $valueField = null, $textField = null, $groupField = '') {
			$listData = array();
			if ($groupField === '') {
				foreach ($models as $model) {
					// If $valueField is null, use the primary key.
					if ($valueField === null)
						$value = GxActiveRecord::extractPkValue($model, true);
					else
						$value = self::valueEx($model, $valueField);
					$text = self::valueEx($model, $textField);
					$listData[$value] = $text;
				}
			} else {
				foreach ($models as $model) {
					// If $valueField is null, use the primary key.
					if ($valueField === null)
						$value = GxActiveRecord::extractPkValue($model, true);
					else
						$value = self::valueEx($model, $valueField);
					$group = self::valueEx($model, $groupField);
					$text = self::valueEx($model, $textField);
					$listData[$group][$value] = $text;
				}
			}
			return $listData;
		}

		public static function activeCheckBoxList($model, $attribute, $data, $htmlOptions = array()) {
			self::resolveNameID($model, $attribute, $htmlOptions);
			$selection = self::selectData(self::resolveValue($model, $attribute)); // #Change: Added support to HAS_MANY and MANY_MANY relations.
			if ($model->hasErrors($attribute))
				self::addErrorCss($htmlOptions);
			$name = $htmlOptions['name'];
			unset($htmlOptions['name']);

			if (array_key_exists('uncheckValue', $htmlOptions)) {
				$uncheck = $htmlOptions['uncheckValue'];
				unset($htmlOptions['uncheckValue']);
			}
			else
				$uncheck = '';

			$hiddenOptions = isset($htmlOptions['id']) ? array('id' => self::ID_PREFIX . $htmlOptions['id']) : array('id' => false);
			$hidden = $uncheck !== null ? self::hiddenField($name, $uncheck, $hiddenOptions) : '';

			return $hidden . self::checkBoxList($name, $selection, $data, $htmlOptions);
		}

		public static function encodeEx($data, $encodeKeys = false, $encodeValues = false, $recursive = true) {
			if (is_array($data)) {
				$encodedArray = array();
				foreach ($data as $key => $value) {
					$encodedKey = ($encodeKeys && is_string($key)) ? parent::encode($key) : $key;
					if (is_array($value))
						if ($recursive)
							$encodedValue = self::encodeEx($value, $encodeKeys, $encodeValues, $recursive);
						else
							$encodedValue = $value;
					else
						$encodedValue = ($encodeValues && is_string($value)) ? parent::encode($value) : $value;
					$encodedArray[$encodedKey] = $encodedValue;
				}
				return $encodedArray;
			} else if (is_string($data))
				return parent::encode($data);
			else
				throw new InvalidArgumentException('The argument "data" must be of type string or array.');
		}


	}
 ?>