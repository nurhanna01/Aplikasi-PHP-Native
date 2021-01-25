	<header>
		<a href="?module=main"><h1>SK</h1></a>
	        <nav>
	            <ul>
	                <li><a href="?module=pakaian" class="menu">Pakaian</a></li>
	                <li><a href="?module=elektronik" class="menu">Elektronik</a></li>
	                <li><a href="#wisata" class="menu">Kosmetik</a></li>
		            <li><a href="?module=tambah_produk" class="menu">Tambah Produk</a>
			            <!-- <div class="dropdown">
							<span>Tambah Item</span>
							<div class="dropdown-content">
								<a href="?module=tambah_pakaian"><button>Pakaian</button></a>
								<a href="?module=tambah_elektronik"><button>Elektronik</button></a>
								<a href="#"><button>Kosmetik</button></a>
							</div>
						</div> -->
					</li>	            

				</ul>
				<?php if(!isset($_SESSION['username'])){ ?>
				<a href="?module=login"><i class='fas fa-user-circle'>Login</i></a>
				<?php }else{ ?>
				<a href="?module=profil"><i class='fas fa-user-circle'>Profile</i></a>
				<?php } ?>
					            
        	</nav>
	</header>