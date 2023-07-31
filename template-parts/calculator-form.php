
<div class="form-calculator ">
	<div class="bg-block bg-block-top"></div>
	<div class="bg-block bg-block-left"></div>
	<div class="bg-block bg-block-right"></div>
	<div class="bg-block bg-block-bottom"></div>
	<form id="calculator_form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" name="calculator-form">
	<fieldset id="step-1" class="">
		<div class="calculator-title">
			Get an <span class="blue-text-color">instant quote or call</span> now <a class="blue-text-color"
				href="tel:8889888865">(888) 988-8865</a>
		</div>
		<hr>
		<div class="input-wrap input-wrap-list">
			<label for="city_from" class="input-label">Transport car <span class="font-w-700">FROM:</span></label>
			<input class="input q-input" id="city_from" type="search" name="city_from" value="" autocomplete="off"
				placeholder="ZIP or City">
			<span class="city_error_from error-text"></span>
			<ul id="city_select" class="list-select d-none"></ul>
		</div>
		<div class="input-wrap input-wrap-list border-t-none">
			<label for="city_to" class="input-label">Transport car <span class="font-w-700">TO:</span></label>
			<input class="input q-input" id="city_to" type="search" name="city_to" value="" autocomplete="off"
				placeholder="ZIP or City" data-np-uid="701b84c7-efbd-4fb4-b256-56d26d0e834a"
				data-np-autofill-type="zip">
			<span class="city_error_to error-text"></span>
			<ul id="city_select_to" class="list-select d-none"></ul>
		</div>
		<div class="">
			<div class="">Transport <span class="font-w-700">METHOD:</span></div>
			<div class="radio-btn-group">
				<div class="custom-radio">
					<input name="transport_type" type="radio" checked="" value="open" id="open-transport">
					<label for="open-transport" class="mr-2 p text-gray">Open</label>
				</div>
				<div class="custom-radio">
					<input name="transport_type" type="radio" value="enclosed" id="enclosed-transport">
					<label for="enclosed-transport" class="p text-gray">Enclosed</label>
				</div>
			</div>
		</div>
		<button class="primary-btn big-btn w-100 text-uppercase" id="button-step-1">
			Vehicle details
		</button>
	</fieldset>
	<fieldset class="d-none" id="step-2">
         <div class="input-wrap input-wrap-list">
             <span class="year_error error-text"></span>
            <label for="year" class="input-label">Vehicle year</label>
			<select class="" name="vehicle-year" id="year">
				<option disabled selected value>Select</option>
				<option value="2024">2024</option>
				<option value="2024">2024</option>
				<option value="2023">2023</option>
				<option value="2022">2022</option>
				<option value="2021">2021</option>
				<option value="2020">2020</option>
				<option value="2019">2019</option>
				<option value="2018">2018</option>
				<option value="2017">2017</option>
				<option value="2016">2016</option>
				<option value="2015">2015</option>
				<option value="2014">2014</option>
				<option value="2013">2013</option>
				<option value="2012">2012</option>
				<option value="2011">2011</option>
				<option value="2010">2010</option>
				<option value="2009">2009</option>
				<option value="2008">2008</option>
				<option value="2007">2007</option>
				<option value="2006">2006</option>
				<option value="2005">2005</option>
				<option value="2004">2004</option>
				<option value="2003">2003</option>
				<option value="2002">2002</option>
				<option value="2001">2001</option>
				<option value="2000">2000</option>
				<option value="1999">1999</option>
				<option value="1998">1998</option>
				<option value="1997">1997</option>
				<option value="1996">1996</option>
				<option value="1995">1995</option>
				<option value="1994">1994</option>
				<option value="1993">1993</option>
				<option value="1992">1992</option>
				<option value="1991">1991</option>
				<option value="1990">1990</option>
				<option value="1989">1989</option>
				<option value="1988">1988</option>
				<option value="1987">1987</option>
				<option value="1986">1986</option>
				<option value="1985">1985</option>
				<option value="1984">1984</option>
				<option value="1983">1983</option>
				<option value="1982">1982</option>
				<option value="1981">1981</option>
				<option value="1980">1980</option>
				<option value="1979">1979</option>
				<option value="1978">1978</option>
				<option value="1977">1977</option>
				<option value="1976">1976</option>
				<option value="1975">1975</option>
				<option value="1974">1974</option>
				<option value="1973">1973</option>
				<option value="1972">1972</option>
				<option value="1971">1971</option>
				<option value="1970">1970</option>
				<option value="1969">1969</option>
				<option value="1968">1968</option>
				<option value="1967">1967</option>
				<option value="1966">1966</option>
				<option value="1965">1965</option>
				<option value="1964">1964</option>
				<option value="1963">1963</option>
				<option value="1962">1962</option>
				<option value="1961">1961</option>
				<option value="1960">1960</option>
				<option value="1959">1959</option>
				<option value="1958">1958</option>
				<option value="1957">1957</option>
				<option value="1956">1956</option>
				<option value="1955">1955</option>
				<option value="1954">1954</option>
				<option value="1953">1953</option>
				<option value="1952">1952</option>
				<option value="1951">1951</option>
				<option value="1950">1950</option>
				<option value="1949">1949</option>
				<option value="1948">1948</option>
				<option value="1947">1947</option>
				<option value="1946">1946</option>
				<option value="1945">1945</option>
				<option value="1944">1944</option>
				<option value="1943">1943</option>
				<option value="1942">1942</option>
				<option value="1941">1941</option>
				<option value="1940">1940</option>
				<option value="1939">1939</option>
				<option value="1938">1938</option>
				<option value="1937">1937</option>
				<option value="1936">1936</option>
				<option value="1935">1935</option>
				<option value="1934">1934</option>
				<option value="1933">1933</option>
				<option value="1932">1932</option>
				<option value="1931">1931</option>
				<option value="1930">1930</option>
				<option value="1929">1929</option>
				<option value="1928">1928</option>
				<option value="1927">1927</option>
				<option value="1926">1926</option>
				<option value="1925">1925</option>
				<option value="1924">1924</option>
				<option value="1923">1923</option>
				<option value="1922">1922</option>
				<option value="1921">1921</option>
				<option value="1920">1920</option>
				<option value="1919">1919</option>
				<option value="1918">1918</option>
				<option value="1917">1917</option>
				<option value="1916">1916</option>
				<option value="1915">1915</option>
				<option value="1914">1914</option>
				<option value="1913">1913</option>
				<option value="1912">1912</option>
				<option value="1911">1911</option>
				<option value="1910">1910</option>
				<option value="1909">1909</option>
				<option value="1908">1908</option>
				<option value="1907">1907</option>
				<option value="1906">1906</option>
				<option value="1905">1905</option>
				<option value="1904">1904</option>
				<option value="1903">1903</option>
				<option value="1902">1902</option>
				<option value="1901">1901</option>
				<option value="1900">1900</option>
				<option value="1899">1899</option>
			</select>
         </div>
         <div class="input-wrap input-wrap-vehicle input-wrap-list border-t-none">
            <span class="vehicle_error error-text"></span>
			<label for="vehicle" class="input-label">Vehicle make</label>
			<select class="" name="vehicle" id="vehicle">
				<option disabled selected value>Select</option>
				<option value="BMW">BMW</option>
			</select>
         </div>
         <div class="input-wrap input-wrap-model input-wrap-list border-t-none">
            <span class="model_error error-text"></span>
            <label for="svehicle_model" class="input-label">Vehicle model</label>
			<select class="" name="vehicle_model" id="vehicle_model">
				<option disabled selected value>Select</option>
				<option value="2 Series">2 Series</option>
				<option value="3 Series">3 Series</option>
				<option value="4 Series">4 Series</option>
				<option value="5 Series">5 Series</option>
				<option value="7 Series">7 Series</option>
				<option value="8 Series">8 Series</option>
				<option value="i3">i3</option>
			</select>
         </div>
         <div class="">
            <div class="">Is it operable?</div>
            <div class="radio-btn-group">
                <div class="custom-radio">
                    <input name="operable" checked="" type="radio" value="running" id="radio-running">
                    <label for="radio-running" class="text-gray">Yes</label>
               </div>
               <div class="custom-radio">
                   <input name="operable" type="radio" value="nonrunning" id="non-running">
                   <label for="non-running" class="text-gray">No</label>
                </div>
            </div>
         </div>
         <button class="primary-btn big-btn w-100 text-uppercase" id="button-step-2">Confirmation details<i class="icon-arrow_forward ml-2"></i></button>
      </fieldset>
	  <fieldset class="d-none" id="step-3">
         <div class="input-wrap input-grey">
             <span class="mail_error error-text"></span>
			 <label for="email_address" class="input-label ">Send a copy of the quote to</label>
            <input id="email_address" name="email_address" type="email" required="" placeholder="Your email" value="">

         </div>
         <div class="input-wrap d-sm-block input-wrap-list date-input-wrap">
             <span class="date_error error-text"></span>
            <label for="shipping_date" class="input-label label-date">First available date</label>
			<select class="" name="shipping_date" id="shipping_date">
				<option value="asap" selected>As soon as possible</option>
               	<option value="2weeks">Within 2 weeks</option>
              	<option value="30days">Within 30 days</option>
               	<option value="over30days">More than 30 days</option>
			</select>

         </div>
         <div class="input-wrap input-grey d-none" id="datepicker-wrap">
            <span class="datepicker_error error-text"></span>
			<label id="datepicker-label" for="datepicker" class="input-label ">Select date</label>
             <input type="text" id="datepicker" class="" readonly="" placeholder="MM/DD/YYYY">

         </div>

         <div class="input-wrap input-grey">
		 	<label for="telephone" class="input-label">Phone <span class="color-black-50-opacity">(optional)</span></label>
            <input id="telephone" name="telephone" type="tel" autocomplete="off" placeholder="Your phone" value="" inputmode="text">

         </div>

		 <input type="hidden" name="action" value="create_new_order">
    		<input type="hidden" name="createNewOrder" value="calculator" id="hidden-form">

		 <?php wp_nonce_field('create_new_order_action', 'create_new_order_nonce'); ?>

            <div class="privacy-note py-3">
            By providing your phone number and clicking through, you agree to our <a>Terms</a>, <a>Privacy Policy</a>, and authorize us to make or initiate sales calls, text msgs, and prerecorded voicemails to that number using an automated system. Your agreement is not a condition of purchasing products, goods or services. You may opt out at any time.
         </div>
         <button class="primary-btn big-btn w-100 text-uppercase" id="button-step-3" name="calculate-this">Calculate cost</button>
      </fieldset>
</form>
</div>