<v-footer height="auto" class="grey darken-3">
    <v-layout justify-center>
        <!-- <div class="tt-l menu_footer">
<div class="menu-menu-footer-container"><ul id="menu-menu-footer" class="nav"><li id="menu-item-80" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-80"><a href="http://www.winwin97.com/">หน้าหลัก</a></li>
<li id="menu-item-81" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-81"><a href="http://www.winwin97.com/casino/">คาสิโนออนไลน์</a></li>
<li id="menu-item-82" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-82"><a href="http://www.winwin97.com/sport/">สปอร์ตออนไลน์</a></li>
<li id="menu-item-485" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-485"><a href="http://www.winwin97.com/lotto/">หวยออนไลน์</a></li>
<li id="menu-item-146" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-146"><a href="http://www.winwin97.com/register/">สมัครสมาชิก</a></li>
<li id="menu-item-83" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-83"><a href="http://www.winwin97.com/promotion/">โปรโมชั่น</a></li>
<li id="menu-item-293" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-293"><a href="http://www.winwin97.com/banking/">แจ้งฝาก – แจ้งถอน</a></li>
<li id="menu-item-488" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-488"><a href="http://www.winwin97.com/live-score/">LIVE SCORE</a></li>
<li id="menu-item-85" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-85"><a href="http://www.winwin97.com/contact/">ติดต่อเรา</a></li>
</ul></div> 
</div> -->
		
		<div style="padding: 10px 0px;">
			<div>
				<a class="fmenu" target="blank" color="white" flat v-for="(fmenu,i) in fmenus" :key="i" :href="fmenu.link" style="color:#FFF !important; text-decoration: none; padding: 15px 5px;margin-top:10px !important;">
					{{fmenu.text}}
				</a>
			</div>
			<v-divider></v-divider>
			<center>
					<span  style="color:#FFF !important; text-decoration: none;text-align: center;">Copyright 2017 ©  <a title="Winwin97 : SPORT AND CASINO ONLINE" href="http://www.winwin97.com/" style="color:#FFF !important; text-decoration: none;">WINWIN97.COM </a> All Rights Reserved.</span>
			</center>
			
		</div>
    </v-layout>
</v-footer>