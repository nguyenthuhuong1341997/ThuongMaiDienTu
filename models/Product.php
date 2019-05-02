<?php 
	include_once 'Connection.php';
	/**
	 * 
	 */
	class Product
	{
		var $product_conn;
		function __construct()
		{
			$object= new Connection();
			$this->product_conn= $object->conn;
		}

		function list()
		{
			$query="SELECT products.*, category.name AS category_name, category.parent_name
					FROM products, (SELECT categories.id, categories.name, parent.name AS parent_name
						FROM categories, (SELECT categories.id, categories.name from categories WHere categories.parent_id IS NULL) AS parent
						WHERE categories.parent_id = parent.id) AS category
					WHERE products.category_id= category.id";
			$result= $this->product_conn->query($query);
			$data= array();
			while ($row= $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
			
		}

		function listPro($id)
		{
			$query="SELECT product_details.*,sizes.name as size_name,colors.name as color_name
				FROM product_details ,sizes,colors
				WHERE product_id = ".$id."
				AND product_details.size_id = sizes.id
				AND product_details.color_id = colors.id";
			$result= $this->product_conn->query($query);
			$data= array();
			while ($row= $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
			
		}

		function insert($data)
		{	
			$query="INSERT INTO products(code,name, description, price,category_id)
				values('".$data['code']."','".$data['name']."','".$data['description']."','".$data['price']."','".$data['category_id']."')";

			$result = $this->product_conn->query($query);
			return $result;
		}

		function find($id)
		{
			$query = "SELECT *
					FROM categories,products
					WHERE products.id = ".$id."
					AND products.category_id=categories.id
					";

			$result = $this->product_conn->query($query);
			$row= $result->fetch_assoc();
			return $row;
		}

		function update($data,$id)
		{
			$query="UPDATE products SET name='".$data['name']."',description='".$data['description']."',price=".$data['price'].",category_id=".$data['category_id']." WHERE id=".$id;
			
			// die;
			$result = $this->product_conn->query($query);
			return $result;
		}

		function delete($id)
		{
			$query= "DELETE FROM products WHERE id=" .$id;
			$result = $this->product_conn->query($query);
			return $result;
		}
		function findDetail($id)
		{
			$query="SELECT product_details.*,sizes.name as size_name,colors.name as color_name,product_images.image as name_image,products.name as name_product
				FROM product_details ,sizes,colors,product_images,products
				WHERE product_details.id = ".$id."
				AND product_details.size_id = sizes.id
				AND product_details.color_id = colors.id
				AND product_details.product_image_id = product_images.id
				AND product_details.product_id = products.id";
			$result= $this->product_conn->query($query);
			$data = $result->fetch_assoc();
			return $data;
			
		}
		function insertDetail($data)
		{	
			move_uploaded_file($_FILES['image']['tmp_name'],'C:/xampp/htdocs/test/ThuongMaiDienTu/public/upload/'. $_FILES['image']['name']);
			$query2 = "SELECT * FROM product_images WHERE image = 'public/upload/".$_FILES['image']['name']."'";
			$result2 = $this->product_conn->query($query2)->fetch_assoc();
			if(!isset($result2['id'])){
				$query1 = "INSERT INTO product_images(image)
				values('public/upload/".$_FILES['image']['name']."')";
				$result1 = $this->product_conn->query($query1);
				$result3 = $this->product_conn->query($query2)->fetch_assoc();
				$img_id = $result3['id'];
			}else{
				$img_id = $result2['id'];
			}
			$query="INSERT INTO product_details(product_id,size_id,color_id, quantity,product_image_id)
				values('".$data['product_id']."','".$data['size_id']."','".$data['color_id']."','".$data['quantity']."','".$img_id."')";
			
			$result = $this->product_conn->query($query);
			return $result;
		}
		function updateDetail($data,$id)
		{
			$query="UPDATE product_details SET size_id='".$data['size_id']."',color_id='".$data['color_id']."',quantity=".$data['quantity']." WHERE id=".$id;

			$result= $this->product_conn->query($query);
			return $result;
			
		}
		function deleteDetail($id)
		{
			$query= "DELETE FROM product_details WHERE id=" .$id;
			$result = $this->product_conn->query($query);
			return $result;
		}
	}
?>