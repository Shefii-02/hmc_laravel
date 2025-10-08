<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<style type="text/css">
		@media screen {
			@font-face {
				font-family: 'Lato';
				font-style: normal;
				font-weight: 400;
				src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
			}

			@font-face {
				font-family: 'Lato';
				font-style: normal;
				font-weight: 700;
				src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
			}

			@font-face {
				font-family: 'Lato';
				font-style: italic;
				font-weight: 400;
				src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
			}

			@font-face {
				font-family: 'Lato';
				font-style: italic;
				font-weight: 700;
				src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
			}
		}

		/* CLIENT-SPECIFIC STYLES */
		body,
		table,
		td,
		a {
			-webkit-text-size-adjust: 100%;
			-ms-text-size-adjust: 100%;
		}

		table,
		td {
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
		}

		img {
			-ms-interpolation-mode: bicubic;
		}

		/* RESET STYLES */
		img {
			border: 0;
			height: auto;
			line-height: 100%;
			outline: none;
			text-decoration: none;
		}

		table {
			border-collapse: collapse !important;
		}

		body {
			height: 100% !important;
			margin: 0 !important;
			padding: 0 !important;
			width: 100% !important;
		}

		/* iOS BLUE LINKS */
		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		/* MOBILE STYLES */
		@media screen and (max-width:600px) {
			h1 {
				font-size: 32px !important;
				line-height: 32px !important;
			}
		}

		/* ANDROID CENTER FIX */
		div[style*="margin: 16px 0;"] {
			margin: 0 !important;
		}
	</style>
</head>

<body style="background-color: #032d6c40; margin: 0 !important; padding: 0 !important;"> <!-- HIDDEN PREHEADER TEXT -->
	<table border="0" cellpadding="0" cellspacing="0" width="100%"> <!-- LOGO -->
		<tr>
			<td bgcolor="#032d6c40" align="center">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
					<tr>
						<td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td bgcolor="#032d6c40" align="center" style="padding: 0px 10px 0px 10px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
					<tr>
						<td bgcolor="#ffffff" align="center" valign="top" style="padding: 20px 10px 10px 10px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
							<img src="{{url('assets/img/logo-white.png')}}" width="100%" height="120" style="display: block; border: 0px; margin : 30px 20px 20px 20px" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td bgcolor="#032d6c40" align="center" style="padding: 0px 10px 0px 10px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
					<tr>
						<td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
							<h1 style="font-size: 28px; font-weight: 800; margin: 2;">{{ $recipientType === 'business' ? 'New Contact Form Submission' : 'Thank You' }}</h1>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
					<tr>
						<td bgcolor="#ffffff" align="center" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 800; line-height: 25px;">
							<p style="margin: 0;">{{ $recipientType === 'business' ? 'New Contact Form Submission.Below are the details' : 'Thank you for contacting us. Our staff will be in touch with you soon. Below are the details:' }}</p>
						</td>
					</tr>
					<tr>
						<table bgcolor="#f4f4f4"  border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
						    <tr align="left">
						        <td bgcolor="#ffffff" align="left"  style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 800; line-height: 25px;">Full Name :</td>
						        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 800; line-height: 25px;">{{$name}}</td>
						    </tr>
						    <tr align="left">
						        <td bgcolor="#ffffff" align="left"  style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 800; line-height: 25px;">Email Address :</td>
						        <td bgcolor="#ffffff" align="left"  style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 800; line-height: 25px;">{{$email}}</td>
						    </tr>
						    <tr align="left">
						        <td bgcolor="#ffffff" align="left"  style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 800; line-height: 25px;">Mobile Number :</td>
						        <td bgcolor="#ffffff" align="left"  style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 800; line-height: 25px;">{{$mobile}}</td>
						    </tr>
						    <tr align="left">
						        <td bgcolor="#ffffff" align="left"  style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 800; line-height: 25px;">Subject :</td>
						        <td bgcolor="#ffffff" align="left"  style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 800; line-height: 25px;">{{$subject_content}}</td>
						    </tr>
						    <tr align="left">
						        <td bgcolor="#ffffff" align="left"  style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 800; line-height: 25px;">Message :</td>
						        <td bgcolor="#ffffff" align="left"  style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 800; line-height: 25px;">{{$messagess}}</td>
						    </tr>
						</table>
					</tr>
				</table>
			</td>
		</tr>




	</table>
	<div style="text-align:center">
	     <h2 style="font-size: 20px; font-weight: 800; color: #000000; margin-top: 10px;margin-top: 20px;">Need more help?</h2>
        <p style="margin: 0;"><a href="{{url('contact-us')}}" target="_blank" style="color: #FFA73B;">We&rsquo;re here to help you out</a></p>
				</td>
	</div>
</body>

</html>
