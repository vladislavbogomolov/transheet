<div id="top"></div>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/vladislavbogomolov/transheet">
    <img src="images/logo.png" alt="Logo" width="150">
  </a>

  <h3 align="center">Transheet</h3>

  <p align="center">
    Free solution to manage your translations
    <br />
    <br />
    <a href="https://github.com/vladislavbogomolov/transheet/issues">Report Bug</a>
    ·
    <a href="https://github.com/vladislavbogomolov/transheet/issues">Request Feature</a>
  </p>
</div>


<!-- GETTING STARTED -->
## Getting Started


### Enable Google Sheets API and create Service account
1. [Go to Console Google Cloud Platform
](https://console.cloud.google.com/apis/library)
2. Enable "Google Sheets API"
3. Click "Manage"
4. Click "Credentials"
5. Click "Create credentials"
6. Click "OAuth client ID"
7. Click "Configure consent screen"
8. Choose "External" > Create
9. Add scopes for "Google Sheets API" ``.../auth/drive.file``
10. Save and continue
11. Publish app
12. Click on “Credentials” and choose "OAuth Client ID" from the “Create credentials”
13. Choose "Web application" and click "Create"
14. Click on "Download json", put file in root of your project and rename it in ``client_secret.json``
15. Click "Service account"
16. Type "ServiceAccount" in "Service account name" text field
17. Click "Create and continue"
18. Click "Done"
19. Copy EMAIL address of service account created

### Create Spreadsheet
1. [Start a new spreadsheet](https://docs.google.com/spreadsheets/u/0/create?usp=sheets_home&ths=true)
2. Click "Share" the button into the top right corner
3. Past copied service account email and click "Done"
4. Add to your .env ID of spreadsheet created.

Example: 

```sh
   SPREADSHEETID=1Tu3EvufoNVnnUvRnc-3d-3raww6Z7ti951xegnqlsDM
   ```
5. Add to your .env sheet name. 

Example: 

```sh
   SHEETNAME=Sheet1
   ```
6. Set A1 with value "key" without double quotes
7. From B1 to Z1 set [ISO 639-1 Code](https://www.loc.gov/standards/iso639-2/php/code_list.php) languages of interest

Example:

[![Product Name Screen Shot][product-screenshot]](https://example.com)

### Installation package

1. Install

 ```sh
 composer require vladislavbogomolov/transheet
 ```
 
 2. Add into ``./config/app.php`` file, after ``Package Service Providers...`` comment
 ```php
 Vladislavbogomolov\Transheet\TransheetServiceProvider::class,
 ```


<!-- USAGE EXAMPLES -->
## Usage

This command will create ``transheet.php`` in each language folder.

```sh
php artisan transheet:download
```


<p align="right">(<a href="#top">back to top</a>)</p>




<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/vladislavbogomolov/transheet.svg?style=for-the-badge
[contributors-url]: https://github.com/vladislavbogomolov/transheet/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/vladislavbogomolov/transheet.svg?style=for-the-badge
[forks-url]: https://github.com/vladislavbogomolov/transheet/network/members
[stars-shield]: https://img.shields.io/github/stars/vladislavbogomolov/transheet.svg?style=for-the-badge
[stars-url]: https://github.com/vladislavbogomolov/transheet/stargazers
[issues-shield]: https://img.shields.io/github/issues/vladislavbogomolov/transheet.svg?style=for-the-badge
[issues-url]: https://github.com/vladislavbogomolov/transheet/issues
[license-shield]: https://img.shields.io/github/license/vladislavbogomolov/transheet.svg?style=for-the-badge
[license-url]: https://github.com/vladislavbogomolov/transheet/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/vladbogomolov/
[product-screenshot]: images/screenshot.png
