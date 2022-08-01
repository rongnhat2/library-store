<?php

namespace App\Repositories\Manager;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Session;
use Hash;
use DB;

class CommentRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    // Kiểm tra người dùng đã đánh giá chưa
    public function get_customer($id, $product_id){
        $sql = "SELECT * FROM comment WHERE customer_id = ".$id." AND product_id = ".$product_id;
        return DB::select($sql);
    }
    
    public function get_all($id){
        $sql = "SELECT comment.*,
                        customer_detail.name
                    FROM comment
                    LEFT JOIN customer_detail
                    ON customer_detail.customer_id = comment.customer_id 
                    WHERE product_id = ".$id."
                    ORDER BY comment.created_at DESC LIMIT 5";
        return DB::select($sql);
    }
    public function get_rate($id){
        $sql = "SELECT rating,
                        count(rating) as count
                FROM comment
                WHERE product_id = ".$id."
                GROUP BY rating;";
        return DB::select($sql);
    }
}
