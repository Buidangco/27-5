<?php
namespace App;

class Cart{
	public $products=null;
	public $totalPrice=0; 
	public $totalQuanty=0;

	public function __construct($cart)
	{
		if($cart){
			$this->products=$cart->products; 
			$this->totalPrice=$cart->totalPrice; 
			$this->totalQuanty=$cart->totalQuanty; 
		}
	}

	public function AddCart($product,$id){
		$newproduct=['quanty'=>0,'price'=>$product->price,'productinfo'=>$product];
		if($this->products){
			if(array_key_exists($id, $this->products))
			{
				$newproduct = $this->products[$id];
			}
		}
		$newproduct['quanty']++;
		$newproduct['price']=$newproduct['quanty']*$product->price;
		$this->products[$id]=$newproduct;
		$this->totalPrice+=$product->price;
		$this->totalQuanty++;
	}

	public function DeleteItemCart($id){
		$this->totalQuanty-=$this->products[$id]['quanty'];
		$this->totalPrice-=$this->products[$id]['price'];
		unset($this->products[$id]);
	}

	public function saveItemCart($id,$quanty){
		$this->totalQuanty -=$this->products[$id]['quanty'];
		$this->totalPrice -=$this->products[$id]['price'];

		$this->products[$id]['quanty']=$quanty;
		$this->products[$id]['price']=$quanty*$this->products[$id]['productinfo']->price;

		$this->totalQuanty +=$this->products[$id]['quanty'];
		$this->totalPrice +=$this->products[$id]['price'];
	}

	public function AddCart1($product,$id,$quanty){
		$newproduct=['quanty'=>0,'price'=>$product->price,'productinfo'=>$product];
		if($this->products){
			if(array_key_exists($id, $this->products))
			{
				$newproduct = $this->products[$id];
			}
		}
		$newproduct['quanty']++;
		$newproduct['price']=$newproduct['quanty']*$product->price;
		$this->products[$id]=$newproduct;
		$this->totalPrice+=$product->price;
		$this->totalQuanty++;

		$this->totalQuanty -=$this->products[$id]['quanty'];
		$this->totalPrice -=$this->products[$id]['price'];
		$this->products[$id]['quanty']=$quanty;
		$this->products[$id]['price']=$quanty*$this->products[$id]['productinfo']->price;

		$this->totalQuanty +=$this->products[$id]['quanty'];
		$this->totalPrice +=$this->products[$id]['price'];
	}
}
?>