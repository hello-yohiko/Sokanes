<section class="post-edit">
	
	<div class="content-sect">
		
		<div class="header-sect">
			
			<div class="name">
				<span class="h1">Edit Post</span>
				<p>
					<?php if(isset($error)) { echo $error; } ?>
				</p>
			</div>

		</div>
		<div class="body-sect">

			<form method="post" enctype="multipart/form-data">
			
				<section class="left-post">
					
					<div class="mg">
						
						<section class="content-form">

							<?php if(isset($getUserAct['title']) && $getUserAct['title'] == true) { ?>
							
							<div class="contenaire-input input-block">
								<label>Username</label>
								<input type="text" name="title" placeholder="Title" value="<?php if(isset($dataEditor['post_title'])) { echo "{$dataEditor['post_title']}"; } ?>">
							</div>

							<?php } ?>

							<?php if(isset($getUserAct['subTitle']) && $getUserAct['subTitle'] == true) { ?>

							<div class="contenaire-input subtitle input-block">
								<label>SubTitle</label>
								<textarea name="subtitle" placeholder="Ma description"><?php if(isset($dataEditor['post_subTitle'])) { echo "{$dataEditor['post_subTitle']}"; } ?></textarea>
							</div>

							<?php } ?>

							<?php if(isset($getUserAct['content']) && $getUserAct['content'] == true) { ?>

							<div class="content input-block editor-text">
								<label>Content</label>
								<textarea name="content" id="editor" placeholder="Ma publication"><?php if(isset($dataEditor['post_content'])) { echo "{$dataEditor['post_content']}"; } ?></textarea>
							</div>

							<?php } ?>
							<script type="text/javascript">
								ClassicEditor 
									.create( 
										document.querySelector( '#editor' ) 
									) 
									.then( editor => {
									} ) 
									.catch( error => { 
										console.error( error ); 
									} );
							</script>

						</section>

					</div>

					<?php if(isset($getUserAct['all']) && $getUserAct['all'] == false) { ?>

					<input type="submit" name="submit">

					<?php } ?>

				</section>

				<section class="right-post">

					<div class="mg">
						<section class="list">

							<?php if(isset($getUserAct['min']) && $getUserAct['min'] == true) { ?>

							<div class="input">
								<div class="title-sect">
									<b>Miniature</b>
								</div>
								<div class="content-sect">
									<div class="input-upload">
										<input name="avatar" type="file" />
									</div>
									<?php 
									if(isset($dataEditor['post_content'])) {
									?>
									<div class="input-view">
										<img src="<?= "{$dataEditor['post_min']}" ?>" width="100%">
									</div>
									<?php } ?>
								</div>
							</div>

							<?php } ?>

							<?php if(isset($getUserAct['type']) && $getUserAct['type'] == true) { ?>
							
							<div class="contenaire-input input select">
								<ul>
									<li>
										<div class="title-sect">
											<b>catégorie</b>
										</div>
									</li>
									<ul>
										<?php
										/* verfication du champs */
										for($i = 0; $i < count($tabInfCat); $i++)
										{
											?>
											<li>
												<input name="type" type="radio" value="<?= $tabInfCat[$i]['term_group'] ?>" id="a<?= $i ?>a"
												<?php
												if(
													$i == 0 
													||
													isset($dataEditor['post_content'])
													&&
													$tabInfCat[$i]['term_group'] == $dataEditor['post_type']['term_group']
												)
												{
													echo "checked";
												}
												?>
												class="checkbox-item"
												>
												<label for="a<?= $i ?>a" class="block element-input">
													<?= $tabInfCat[$i]['name'] ?>
												</label>
											</li>
											<?php
										}
										?>
									</ul>
								</ul>
							</div>

							<?php } ?>

						</section>
					</div>
					
				</section>

			</form>

		</div>
		<div class="footer-sect"></div>

	</div>

</section>