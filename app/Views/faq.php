<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Frequently asked question</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?= url('Home/index')?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Faq</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="section">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
            	<div class="heading_s1 mb-3 mb-md-5">
                	<h3>General questions</h3>
                </div>
            	<div id="accordion" class="accordion accordion_style1">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Do you have any built-in caching?</a> </h6>
                          </div>
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                            	<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
						<div class="card-header" id="headingTwo">
                        	<h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How do I upload files from my phone or tablet?</a> </h6>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        	<div class="card-body"> 
                        		<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                        		<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
						<div class="card-header" id="headingThree">
                        	<h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How can I start my design?</a> </h6>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
							<div class="card-body"> 
                            	<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. </p><p>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
								<ul class="list_style_3">
                                    <li>The standard chunk of Lorem Ipsum below for those interested</li>
                                    <li>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugi</li>
                                    <li>Et harum quidem rerum facilis est et expedita distinctio</li>
                                    <li>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores</li>
                                    <li>when our power of choice is untrammelled and when nothing prevents</li>
                            	</ul>
                        	</div>
                      	</div>
                    </div>
                    <div class="card">
						<div class="card-header" id="headingFour">
                        	<h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">What are popular free webpage builders?</a> </h6>
                      	</div>
                      	<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
							<div class="card-body"> 
                            	<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                        		<p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                        		<ul class="list_style1">
                                    <li>The standard chunk of Lorem Ipsum below for those interested</li>
                                    <li>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugi</li>
                                    <li>Et harum quidem rerum facilis est et expedita distinctio</li>
                                    <li>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores</li>
                                    <li>when our power of choice is untrammelled and when nothing prevents</li>
                            	</ul>
                        	</div>
                      	</div>
                    </div>
                    <div class="card">
						<div class="card-header" id="headingFive">
                        	<h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">How do you make your own website for free?</a> </h6>
                      	</div>
                      	<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                        	<div class="card-body"> 
                            	<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                        		<p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                        		<p> Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                        	</div>
                      	</div>
                    </div>
              	</div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
            	<div class="heading_s1 mb-3 mb-md-5">
                	<h3>Other questions</h3>
                </div>
            	<div id="accordion2" class="accordion accordion_style1">
                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">What is the weirdest website on the internet?</a> </h6>
                          </div>
                          <div id="collapseSix" class="collapse show" aria-labelledby="headingSix" data-parent="#accordion2">
                            <div class="card-body">
                            	<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
						<div class="card-header" id="headingSeven">
                        	<h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">Can I add/upgrade my plan at any time?</a> </h6>
						</div>
						<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion2">
                        	<div class="card-body"> 
                        		<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                        		<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
						<div class="card-header" id="headingEight">
                        	<h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">What access comes with my hosting plan?</a> </h6>
						</div>
						<div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion2">
							<div class="card-body"> 
                            	<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. </p><p>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
								<ul class="list_style_3">
                                    <li>The standard chunk of Lorem Ipsum below for those interested</li>
                                    <li>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugi</li>
                                    <li>Et harum quidem rerum facilis est et expedita distinctio</li>
                                    <li>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores</li>
                                    <li>when our power of choice is untrammelled and when nothing prevents</li>
                            	</ul>
                        	</div>
                      	</div>
                    </div>
                    <div class="card">
						<div class="card-header" id="headingNine">
                        	<h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">What are some lesser known but useful websites?</a> </h6>
                      	</div>
                      	<div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion2">
							<div class="card-body"> 
                            	<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                        		<p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                        		<ul class="list_style1">
                                    <li>The standard chunk of Lorem Ipsum below for those interested</li>
                                    <li>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugi</li>
                                    <li>Et harum quidem rerum facilis est et expedita distinctio</li>
                                    <li>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores</li>
                                    <li>when our power of choice is untrammelled and when nothing prevents</li>
                            	</ul>
                        	</div>
                      	</div>
                    </div>
                    <div class="card">
						<div class="card-header" id="headingTen">
                        	<h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">How can web developers benefit from Adage?</a> </h6>
                      	</div>
                      	<div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion2">
                        	<div class="card-body"> 
                            	<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                        		<p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                        		<p> Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                        	</div>
                      	</div>
                    </div>
              	</div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
