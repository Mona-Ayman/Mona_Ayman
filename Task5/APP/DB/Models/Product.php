<?php
namespace APP\DB\Models;
class Product extends Model{
    private $id,$name_en,$name_ar,$image,$price,$details_en,$details_ar,$quantity,$status,$created_at,$updated_at,$category_id,$subcategory_id,$brand_id;
    private const ACTIVE = 1;
    private const NOTACTIVE = 0;
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name_en
     */ 
    public function getName_en()
    {
        return $this->name_en;
    }

    /**
     * Set the value of name_en
     *
     * @return  self
     */ 
    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this;
    }

    /**
     * Get the value of name_ar
     */ 
    public function getName_ar()
    {
        return $this->name_ar;
    }

    /**
     * Set the value of name_ar
     *
     * @return  self
     */ 
    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of details_en
     */ 
    public function getDetails_en()
    {
        return $this->details_en;
    }

    /**
     * Set the value of details_en
     *
     * @return  self
     */ 
    public function setDetails_en($details_en)
    {
        $this->details_en = $details_en;

        return $this;
    }

    /**
     * Get the value of details_ar
     */ 
    public function getDetails_ar()
    {
        return $this->details_ar;
    }

    /**
     * Set the value of details_ar
     *
     * @return  self
     */ 
    public function setDetails_ar($details_ar)
    {
        $this->details_ar = $details_ar;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getproduct() :false|\mysqli_result
    {
        $query = "SELECT * FROM products WHERE status = 1 ";
        $stmt = $this->con->prepare($query);
        if(! $stmt){ 
            return $stmt;
        }
        
       
        $stmt->execute(); 
        return $stmt->get_result();
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of subcategory_id
     */ 
    public function getSubcategory_id()
    {
        return $this->subcategory_id;
    }

    /**
     * Set the value of subcategory_id
     *
     * @return  self
     */ 
    public function setSubcategory_id($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;

        return $this;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }
    public function getProductsByCategory(){
        $query = "SELECT name_en,id,details_en,image,price FROM product_details  WHERE status = " . self::ACTIVE . " AND category_id = ?";
        $stmt = $this->con->prepare($query);
        if(! $stmt){ 
            return $stmt;
        }
        
        $stmt->bind_param('i',$this->category_id);
        $stmt->execute(); 
        return $stmt->get_result();
    }
    public function getProductsBySubategory(){
        $query = "SELECT name_en,id,details_en,image,price FROM products  WHERE status = " . self::ACTIVE . " AND subcategory_id = ?";
        $stmt = $this->con->prepare($query);
        if(! $stmt){ 
            return $stmt;
        }
        
        $stmt->bind_param('i',$this->subcategory_id);
        $stmt->execute(); 
        return $stmt->get_result();
    }
    public function getProductsByBrand(){
        $query = "SELECT name_en,id,details_en,image,price FROM products  WHERE status = " . self::ACTIVE . " AND brand_id = ?";
        $stmt = $this->con->prepare($query);
        if(! $stmt){ 
            return $stmt;
        }
        
        $stmt->bind_param('i',$this->brand_id);
        $stmt->execute(); 
        return $stmt->get_result();
    }
    public function getAllProducts(){
        $query = "SELECT name_en,id,details_en,image,price FROM products  WHERE status = " . self::ACTIVE ;
        $stmt = $this->con->prepare($query);
        if(! $stmt){ 
            return $stmt;
        }
        
        $stmt->execute(); 
        return $stmt->get_result();
    }
    
    public function getProductDetails(){
        $query = "SELECT * FROM product_details  WHERE status = " . self::ACTIVE . " AND id = ?";
        $stmt = $this->con->prepare($query);
        if(! $stmt){ 
            return $stmt;
        }
        
        $stmt->bind_param('i',$this->id);
        $stmt->execute(); 
        return $stmt->get_result();
    }

    public function getReviews()
    {
        $query = "SELECT
                CONCAT(`users`.`first_name` , ' ' , `users`.`last_name`) AS `full_name`,
                `reviews`.rate,
                `reviews`.`comment`,
                `reviews`.`created_at`
            FROM
                `reviews`
            JOIN `users`
            ON `users`.`id` = `reviews`.`user_id`
            WHERE
                `reviews`.`product_id` = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('i',$this->id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getLatestProducts(){
        $query = "SELECT * FROM products  ORDER BY created_at DESC  LIMIT 4 " ;
        $stmt = $this->con->prepare($query);
        if(! $stmt){ 
            return $stmt;
        }
        
        $stmt->execute(); 
        return $stmt->get_result();
    }
    public function getMostOrderedProducts(){
        $query = "SELECT SUM(`orders_products`.`quantity`) AS `quantity`, `products`.`price`, `products`.`image`, `products`.`name_en`
    FROM `orders_products`
    LEFT JOIN `products` 
    ON `products`.`id` = `orders_products`.`product_id`
    GROUP BY `orders_products`.`product_id`
    ORDER BY `quantity` DESC LIMIT 4 " ;
        $stmt = $this->con->prepare($query);
        if(! $stmt){ 
            echo "sorry";die;
        }
        
        $stmt->execute(); 
        return $stmt->get_result();
    }

    
    
}