<?php
namespace pistol88\hospital\models;

use yii;
use yii\data\ActiveDataProvider;

class RecordSearch extends PacientForm
{
    public function search($params)
    {
        $query = PacientForm::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $query->andFilterWhere([
            'status' => $this->status,
        ]);
        
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'family', $this->family])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
} 