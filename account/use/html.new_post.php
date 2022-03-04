<section class="post-edit">
	
	<div class="content-sect">
		
		<div class="header-sect">
			
			<div class="name">
				<span class="h1">Créate Post</span>
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
							
							<div class="content-post input-block">
								<label>Username</label>
								<input type="text" name="title" placeholder="Title">
							</div>

							<div class="content-post subtitle input-block">
								<label>SubTitle</label>
								<textarea name="subtitle" placeholder="Ma description"></textarea>
							</div>

							<div class="content input-block">
								<label>Content</label>
								<textarea name="content" id="editor" placeholder="Ma publication"></textarea>
							</div>
							<script type="text/javascript">
								CKEDITOR.replace( 'editor' );
							</script>

						</section>

					</div>

					<input type="submit" name="submit">

				</section>

				<section class="right-post">

					<div class="mg">
						<section class="list">

							<div class="input">
								<input name="avatar" type="file" />
							</div>
							
							<div class="content-post">
								<ul>
									<li><b>TYPE</b></li>
									<ul>
										<?php
										/* verfication du champs */
										for($i = 0; $i < count($tabInfCat); $i++)
										{
											?>
											<li>
												<input name="type" type="radio" value="<?= $tabInfCat[$i]['term_group'] ?>"
												<?php
												if(
													$i == 0 
													||
													isset($getData)
													&&
													$tabInfCat[$i]['term_group'] == $getData['setting']['post_type']
												)
												{
													echo "checked";
												}
												?>
												class="checkbox-item"
												>
												<div class="block element-input">
													<?= $tabInfCat[$i]['name'] ?>
												</div>
											</li>
											<?php
										}
										?>
									</ul>
								</ul>
							</div>

						</section>
					</div>
					
				</section>

			</form>

		</div>
		<div class="footer-sect"></div>

	</div>

</section>