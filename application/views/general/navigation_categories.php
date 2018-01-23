<?php $categories = $this->base_model->run_query(

		"select * from ".$this->db->dbprefix('categories')." where status='Active' "

		);

		?>
		<section id="main_content">
		<div class="container">