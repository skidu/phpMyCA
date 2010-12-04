<?
/**
 * @package    phpmyca
 * @author     Mike Green <mdgreen@gmail.com>
 * @copyright  Copyright (c) 2010, Mike Green
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
(basename($_SERVER['PHP_SELF']) == basename(__FILE__)) && die('Access Denied');
// breadcrumb
$qs_back = $this->getMenuQs(MENU_CERTS_SERVER);

// footer links
$this->addMenuLink($qs_back,'Cancel','redoutline');
$this->addMenuLink('javascript:clearForm(document.addcert);','Clear Form','greenoutline');
$this->addMenuLink('javascript:document.addcert.submit();','Create Server Certificate','greenoutline');
?>
<?= $this->getPageHeader(false,true); ?>
<?= $this->getFormHeader('addcert'); ?>
<?= $this->getFormBreadCrumb(); ?>
<INPUT TYPE="hidden" NAME="<? echo WA_QS_CONFIRM; ?>" VALUE="yes">
<P>
Please provide the basic information needed to generate the server certifcate
by filling in the form fields below.  Corrections or
changes cannot be made later without having to generate a new certificate
and all of the client certificates that might be signed with this certificate.
</P>
<TABLE>
	<COLGROUP><COL WIDTH="180px"></COLGROUP>
<? $val = (isset($_POST['caId'])) ? $_POST['caId'] : false; ?>
	<TR>
		<TH>Signing Certificate Authority</TH>
		<TD COLSPAN="2">
			<?= $this->getFormSelectCa('caId',$val); ?>
		</TD>
	</TR>
<? $val = (isset($_POST['caPassPhrase'])) ? $_POST['caPassPhrase'] : ''; ?>
	<TR>
		<TH>Certificate Authority Passphrase</TH>
		<TD>
			<INPUT TYPE="password" NAME="caPassPhrase" VALUE="<?= $val; ?>" SIZE="40" MAXLENGTH="64">
		</TD>
	    <TD>
			Enter the CA passphrase, if needed.
	    </TD>
	</TR>
<? $val = (isset($_POST['CommonName'])) ? $_POST['CommonName'] : ''; ?>
	<TR>
		<TH>Host Name</TH>
		<TD>
			<INPUT TYPE="text" NAME="CommonName" VALUE="<?= $val; ?>" SIZE="40" MAXLENGTH="64">
		</TD>
	    <TD>
			(commonName) - fully qualified host and domain name
	    </TD>
	</TR>
<? $val = (isset($_POST['OrgName'])) ? $_POST['OrgName'] : ''; ?>
	<TR>
		<TH>Organization Name</TH>
		<TD>
			<INPUT TYPE="text" NAME="OrgName" VALUE="<?= $val; ?>" SIZE="40" MAXLENGTH="64">
		</TD>
		<TD>
			(organizationName)
		</TD>
	</TR>
<? $val = (isset($_POST['OrgUnitName'])) ? $_POST['OrgUnitName'] : ''; ?>
	<TR>
		<TH>Department Name</TH>
		<TD>
			<INPUT TYPE="text" NAME="OrgUnitName" VALUE="<?= $val; ?>" SIZE="40" MAXLENGTH="64">
		</TD>
		<TD>
			(organizationalUnitName)
		</TD>
	</TR>
<? $val = (isset($_POST['EmailAddress'])) ? $_POST['EmailAddress'] : ''; ?>
	<TR>
		<TH>Contact Email Address</TH>
		<TD>
			<INPUT TYPE="text" NAME="EmailAddress" VALUE="<?= $val; ?>" SIZE="40" MAXLENGTH="64">
		</TD>
		<TD>
			(emailAddress)
		</TD>
	</TR>
<? $val = (isset($_POST['LocalityName'])) ? $_POST['LocalityName'] : ''; ?>
	<TR>
		<TH>City</TH>
		<TD>
			<INPUT TYPE="text" NAME="LocalityName" VALUE="<?= $val; ?>" SIZE="40" MAXLENGTH="64">
		</TD>
		<TD>
			(localityName)
		</TD>
	</TR>
<? $val = (isset($_POST['StateName'])) ? $_POST['StateName'] : ''; ?>
	<TR>
		<TH>State/Province</TH>
		<TD>
			<INPUT TYPE="text" NAME="StateName" VALUE="<?= $val; ?>" SIZE="40" MAXLENGTH="64">
		</TD>
		<TD>
			(stateOrProvinceName)
		</TD>
	</TR>
<? $val = (isset($_POST['CountryName'])) ? $_POST['CountryName'] : ''; ?>
	<TR>
		<TH>Country</TH>
		<TD>
			<INPUT TYPE="text" NAME="CountryName" VALUE="<?= $val; ?>" SIZE="2">
		</TD>
		<TD>
			(countryName)
		</TD>
	</TR>
<? $val = (isset($_POST['Days'])) ? $_POST['Days'] : ''; ?>
	<TR>
		<TH>Days Valid</TH>
		<TD>
			<INPUT TYPE="text" NAME="Days" VALUE="<?= $val; ?>" SIZE="40" MAXLENGTH="5">
		</TD>
		<TD>
			Number of days this certificate is valid
		</TD>
	</TR>
<? $val = (isset($_POST['PassPhrase'])) ? $_POST['PassPhrase'] : ''; ?>
	<TR>
		<TH>Passphrase</TH>
		<TD>
			<INPUT TYPE="password" NAME="PassPhrase" VALUE="<?= $val; ?>" SIZE="40" MAXLENGTH="64">
		</TD>
		<TD>
			Optional passphrase for private key.
		</TD>
	</TR>
</TABLE>
<?= $this->getFormFooter(); ?>
<?= $this->getPageFooter(); ?>
