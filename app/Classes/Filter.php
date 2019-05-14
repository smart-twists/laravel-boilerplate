<?php


namespace App\Classes;

trait Filter
{
    public function scopeFilter($query, $data)
    {
        foreach ($this->filterable as $key => $value) {
            switch ($value) {
                case 'from_to':
                    if (key_exists($key . '_from', $data) && !empty($data[$key . '_from'])) {
                        $field = DateAndNumber::toEnglishNumbers($data[ $key . '_from' ]);
                        $query->where($key, '>=', $field);
                    }
                    if (key_exists($key . '_to', $data) && !empty($data[$key . '_to'])) {
                        $field = DateAndNumber::toEnglishNumbers($data[ $key . '_to' ]);
                        $query->where($key, '<=', $field);
                    }
                    break;
                case 'jalali_from_to':
                    if (key_exists($key . '_from', $data) && !empty($data[$key . '_from'])) {
                        $field = DateAndNumber::toGregorian($data[ $key . '_from' ]);
                        $date = date('Y-m-d 00:00:00', strtotime($field));
                        $query->where($key, '>=', $date);
                    }
                    if (key_exists($key . '_to', $data) && !empty($data[$key . '_to'])) {
                        $field = DateAndNumber::toGregorian($data[ $key . '_to' ]);
                        $date = date('Y-m-d 23:59:59', strtotime($field));
                        $query->where($key, '<=', $date);
                    }
                    break;
                case 'in':
                    if (key_exists($key, $data) && !empty($data[$key])) {
                        $query->whereIn("{$key}", $data[ $key ]);
                    }
                    break;
                case 'pivot_in':
                    if (key_exists($key, $data) && !empty($data[$key])) {
                        $relation_name = explode('_id', $key)[0];
                        $this_class_name = snake_case(class_basename($this));
                        $names_array = [$relation_name, $this_class_name];
                        sort($names_array);
                        $pivot_table_name = implode('_', $names_array);
                        $ids = implode(',', $data[$key]);
                        $query->whereRaw("`id` IN (select `".$this->getForeignKey()."` from `".$pivot_table_name."` where `".$key."` in (".$ids."))");
                    }
                    break;
                case 'equal':
                    if (key_exists($key, $data) && (!empty($data[$key]) || $data[$key] == "0")) {
                        $query->where("{$key}", urldecode($data[ $key ]));
                    }
                    break;
                case 'like':
                    if (key_exists($key, $data) && !empty($data[$key])) {
                        $query->where("{$key}", 'like', '%' . urldecode($data[ $key ]) . '%');
                    }
                    break;
                case 'left_like':
                    if (key_exists($key, $data) && !empty($data[$key])) {
                        $query->where("{$key}", 'like', '%' . urldecode($data[ $key ]));
                    }
                    break;
                case 'right_like':
                    if (key_exists($key, $data) && !empty($data[$key])) {
                        $query->where("{$key}", 'like', urldecode($data[ $key ]) . '%');
                    }
                    break;
            }
        }

        return $query;
    }
}