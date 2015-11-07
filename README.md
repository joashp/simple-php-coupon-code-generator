<h1>Simple PHP Coupon Code Generator</h1>
<p>
Coupon code generator this is php class, which provides the ability to generate coupon codes on various parameters. 
Its key feature is the generation of a coupon code on a mask like this “XXXXXX” or “prefix-XXXX-XXXX-suffix” 
where ‘X’ – random symbol, ‘-’ – custom separator.
</p>
<br/>
<h3>Technology used</h3>
HTML, CSS, JS, PHP

<h3>Key Feature</h3>
<ul>
    <li>Support prefix- and –suffix</li>
    <li>Support any coupon mask</li>
	<li>Support all numbers, alphabets, symbols</li>
	<li>Support different lenghts</li>
	<li>Generate N number of coupons</li>
	<li>Simple Portal</li>
	<li>Export codes to excel sheet</li>
</ul>

<h3>Usage</h3>
1) Dynamic length
<br/>
<code>
	coupon::generate(8);  	// J5BST6NQ
</code>
<br/><br/>
2) Using prefix
<br/>
<code>
	coupon::generate(6, ”XYZ-”);    // XYZ-NT163E
</code>
<br/><br/>
3) Using suffix
<br/>
<code>
	coupon::generate(6, ”XYZ-”, “-ABC”);    // XYZ-TC2MSD-ABC
</code>
<br/><br/>
4) Without numbers
<br/>
<code>
	coupon::generate(6, ””, ””, false);    // LNTDRS
</code>
<br/><br/>
5) Without letters
<br/>
<code>
	coupon::generate(6, ””, ””, true, false);    // 835710
</code>
<br/><br/>
6) With symbols
<br/>
<code>
	coupon::generate(6, ””, ””, true, true, true);    // #H5&S!7
</code>
<br/><br/>
7) Random register <small>(includes lower and uppercase)</small>
<br/>
<code>
	coupon::generate(6, ””, ””, true, true, false, true);    // aT4hB2
</code>
<br/><br/>
8) With custom Mask <small>Note: length does not matter</small>
<br/>
<code>
	coupon::generate(1, ””, ””, true, true, false, false, “XXXXXX”);    // STG6N8
</code>
<br/><br/>

<h2>License</h2>
Simple PHP Coupon Code Generator is licensed under the <a href="http://sam.zoy.org/wtfpl/">WTFPL license</a>.
