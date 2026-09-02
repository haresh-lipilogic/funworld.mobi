<div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
					<?php
					 if($language==2)
					{
					?>
					<li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">بيت</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Action">فعل</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Adventure">مفامرة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Arcade">ممر</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Board">سبورة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Racing">سباق</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Sports">رياضات</a>
                       </li>
					   						 <li class="nav-item">
                            <a class="nav-link" href="Unsub.php">إلغاء الاشتراك</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="aa.php?lan=1">English</a>
                       </li>
					<?php
					}
					else{
					?>
					
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Action">Action</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Adventure">Adventure</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Arcade">Arcade</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Board">Board</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Racing">Racing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Sports">Sports</a>
                        </li>
						<!-- <li class="nav-item">
                            <a class="nav-link" href="Unsub.php">Unsubscribe</a>
                        </li>
						 <li class="nav-item">
                            <a class="nav-link" href="aa.php?lan=2">عربي</a>
                        </li>-->
					<?php
					}
					?>
                    </ul>
                    <form class="d-flex searchbox" role="search" action="action.php">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>