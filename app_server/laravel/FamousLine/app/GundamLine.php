<?php
/**
 * [API]ガンダム名言JSON生成モデルクラス
 *
 *
 * @access public
 * @author Ryosuke Someya <ryosuke.some0618@gmail.com>
 * @copyright  Ryosuke Someya
 * @package Model
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class GundamLine extends Model
{
    //　キャラクターテーブルとのリレーション
    public function character()
    {
        return $this->belongsTo('App\GundamCharacter',  'gundam_character_id', 'character_id');
    }

    // タイトルテーブルとのリレーション
    public function title()
    {
        return $this->belongsTo('App\Title');
    }
    /**
     * すべての名言リストを返却
     *
     * @return Object
     */
    public static function getAllLines()
    {
        $gundam_lines = GundamLine::with('character', 'title')->get();

        return $gundam_lines;
    }

    /**
     * 個別の名言を返却
     *
     * @param  int  $id
     * @return Object
     */
    public static function getLine($id)
    {
        $gundam_line = GundamLine::find($id);

        return $gundam_line;
    }

    /**
     * 名言の数を返却
     *
     * @param  int  $id
     * @return Object
     */
    public static function countLine()
    {
        $gundam_line_count = GundamLine::all()->count();

        return $gundam_line_count;
    }    //
}
