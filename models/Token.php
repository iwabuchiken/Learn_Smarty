<?php

	class Token {
		
		
		private $db_Id;
		
		private $created_at;
		
		private $updated_at;
		
		private $form;
		
		private $hin;
		
		function get_db_Id() {
			
			return $this->db_Id;

		}
		
		function get_created_at() {
			
			return $this->created_at;

		}
		
		function get_updated_at() {
			
			return $this->updated_at;

		}
		
		function get_form() {
			
			return $this->form;

		}
		
		function get_hin() {
			
			return $this->hin;

		}

		/*******************************
			setter
		*******************************/
		function set_db_Id($db_Id) {
			
			
			$this->db_Id	= $db_Id;
			
			return $this;

		}
		
		function set_created_at($created_at) {
			
			
			$this->created_at	= $created_at;

			return $this;

		}
		
		function set_updated_at($updated_at) {
			
			
			$this->updated_at	= $updated_at;

			return $this;

		}
		
		function set_form($form) {
			
			
			$this->form		= $form;

			return $this;

		}
		
		function set_hin($hin) {
			
			
			$this->hin		= $hin;

			return $this;

		}

	}