<?php

namespace App\Repositories\Manager;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Session;
use Hash;
use DB;

class ProductRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function get_data(){
        $sql = "SELECT product.*, category.name as category_name, author.name as author_name
                    FROM product
                    LEFT JOIN category
                    ON category.id = product.category_id
                    LEFT JOIN author
                    ON author.id = product.author_id";
        return DB::select($sql);
    }
    public function get_one($id){
        $sql = "SELECT product.*,
                    category.name as category_name,
                    author.name as author_name
                FROM product 
                LEFT JOIN category
                ON category.id = product.category_id 
                LEFT JOIN author
                ON author.id = product.author_id 
                WHERE product.id = ".$id;
        return DB::select($sql);
    }
    public function update_trending($id){
        $sql = 'UPDATE product set trending = !trending WHERE id = '.$id;
        DB::select($sql);
    }
    


    // Customer

    
    public function get_new(){
        $sql = "SELECT product.*, category.name as category_name, category.id as category_id, author.name as author_name, author.id as author_id
                    FROM product
                    LEFT JOIN category
                    ON category.id = product.category_id
                    LEFT JOIN author
                    ON author.id = product.author_id
                    ORDER BY product.created_at DESC LIMIT 8";
        return DB::select($sql);
    }
    public function get_trending(){
        $sql = "SELECT  *
                FROM product 
                WHERE trending = 1";
        return DB::select($sql);
    } 
    
    public function get_author(){
        $sql = "SELECT  *
                FROM author 
                ORDER BY author.created_at DESC LIMIT 8";
        return DB::select($sql);
    } 
    
    public function get_data_discount(){
        $sql = "SELECT  *
                FROM product
                WHERE discount != 0";
        return DB::select($sql);
    } 
    public function get_data_not_discount(){
        $sql = "SELECT  *
                FROM product
                WHERE discount = 0";
        return DB::select($sql);
    } 
    public function get_top_view($limit){
        $sql = "SELECT  product.*,
                        category.name as category_name, 
                        author.name as author_name
                FROM product 
                LEFT JOIN category
                ON category.id = product.category_id
                LEFT JOIN author
                ON author.id = product.author_id
                ORDER BY product.view DESC
                LIMIT ".$limit;
        return DB::select($sql);
    }
    public function get_best_discount(){
        $sql = "SELECT  product.*,
                        category.name as category_name, 
                        author.name as author_name
                FROM product
                LEFT JOIN category
                ON category.id = product.category_id
                LEFT JOIN author
                ON author.id = product.author_id
                WHERE product.discount != 0
                ORDER BY product.discount DESC LIMIT 1";
        return DB::select($sql);
    } 
    



    public function get_all_condition($request){
        $category_id    = $request->category;
        $keyword        = $request->keyword;

        $sort           = $request->sort;
        $status         = $request->status;
        $where_sql      = "";

        if ($category_id > 0) $where_sql = " AND category_id = ".$category_id;
        if ($keyword != "") $where_sql = " AND name like '".$category_id."'";
        if ($status == "new") {
            $where_sql = " ORDER BY created_at DESC";
        }else if ($status == "hot") {
            $where_sql = " AND trending = 1";
        }else if ($status == "discount") {
            $where_sql = " AND discount != 0";
        }

        $sql = "SELECT product.* ,
                        category.name as category_name, 
                        author.name as author_name 
                FROM product
                LEFT JOIN category
                ON category.id = product.category_id
                LEFT JOIN author
                ON author.id = product.author_id
                WHERE 1 = 1".$where_sql;
        return DB::select($sql);
    }
    public function get_condition($request, $count){
        $category_id    = $request->category;
        $keyword        = $request->keyword;
        $page           = $request->page;
        $pageSize       = 12;

        $sort           = $request->sort;
        $status         = $request->status;
        $where_sql      = "";

        if ($category_id > 0) $where_sql = " AND category_id = ".$category_id;
        if ($keyword != "") $where_sql = " AND name like '".$category_id."'";
        if ($status == "new") {
            $where_sql = " ORDER BY created_at DESC";
        }else if ($status == "hot") {
            $where_sql = " AND trending = 1";
        }else if ($status == "discount") {
            $where_sql = " AND discount != 0";
        }
        $sort_by = "";
        
        if ($sort == 1) {
            $sort_by = " ORDER BY created_at DESC";
        }else if($sort == 2){
            $sort_by = " ORDER BY name ASC";
        }else if($sort == 3){
            $sort_by = " ORDER BY name DESC";
        }else if($sort == 4){
            $sort_by = " ORDER BY prices ASC";
        }else if($sort == 5){
            $sort_by = " ORDER BY prices DESC";
        }
        $offset = $page == 1 ? "" : " OFFSET ".(($page-1) * $pageSize);

        $sql = "SELECT  product.*,
                        category.name as category_name, 
                        author.name as author_name
                FROM product 
                LEFT JOIN category
                ON category.id = product.category_id
                LEFT JOIN author
                ON author.id = product.author_id
                WHERE  1 = 1".$where_sql.$sort_by."
                LIMIT ".$pageSize.$offset;
        
        return DB::select($sql);
    }

    public function get_item_category($id){
        $sql = "SELECT  product.id,
                        product.name,
                        product.slug,
                        product.prices,
                        product.discount,
                        product.images,
                        category.name as category_name
                FROM product 
                LEFT JOIN category
                ON category.id = product.category_id
                WHERE product.category_id = ".$id." LIMIT 6";
        return DB::select($sql);
    }

    public function find_view_history($customer_id, $id){
        $sql = "SELECT  *
                FROM view_history 
                WHERE customer_id = ".$customer_id." AND product_id = ".$id;
        return DB::select($sql);
    }

    public function update_view($id){
        $sql = "UPDATE view_history
                    SET time_view = time_view+1
                    WHERE id = ".$id;
        return DB::select($sql);
    }
    public function updateView($id){
        $this->model->where('id', $id)->update(['view'=> DB::raw('view+1')]);
    }
    public function get_new_arrivals($limit){
        $sql = "SELECT  product.id,
                        product.name,
                        product.slug, 
                        product.images,
                        product.price,
                        category.name as category_name
                FROM product 
                LEFT JOIN category
                ON category.id = product.category_id
                ORDER BY product.created_at DESC
                LIMIT ".$limit;
        return DB::select($sql);
    }

    public function get_recently($user_id, $status){
        $sql = "SELECT  view_history.time_view,
                        product.*
                FROM view_history 
                LEFT JOIN product
                ON product.id = view_history.product_id
                WHERE view_history.customer_id = ".$user_id."
                    AND view_history.status = ".$status."
                ORDER BY view_history.updated_at DESC
                LIMIT 20";
        return DB::select($sql);
    }
    public function get_related($category_id, $id){
        $sql = "SELECT  *
                FROM product 
                WHERE category_id = ".$category_id." AND id <> ".$id."
                LIMIT 4";
        return DB::select($sql);
    }

    public function find_real_time($slug, $category){
        $where_category = $category == 0 ? "" : " AND category_id = ".$category;
        $sql = "SELECT  *
                FROM product 
                WHERE slug like '%".$slug."%'".$where_category."
                LIMIT 5";
        return DB::select($sql);
    }
}
