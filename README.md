# fastactionpdf



If you use the Fast Action Links extension, you can use this extension to generate PDFs from a fast action link if the PDF API extension is installed.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP 7.0+
* CiviCRM 5.16+

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl fastactionpdf@https://github.com/MegaphoneJon/fastactionpdf/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/MegaphoneJon/fastactionpdf.git
cv en fastactionpdf
```

## Usage

When adding an action to a CiviRule with a trigger of "Fast Action Link", select the action "Fast Action PDF" to allow your links to generate PDFs.
![Screenshot showing "Fast Action PDF option on "Add Action" screen](/images/screenshot.png)

## Known Issues

Some of the action parameters make no sense for a fast action PDF.  "Message template for the PDF" is the important paramter; creating activities SHOULD work but is currently untested.  To send an email, use the normal PDF API action.
