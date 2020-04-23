# ALPS WordPress Child Theme

## Theme installation via WordPress Admin Panel

1. In your WordPress admin panel, navigate to `Appearance->Themes`
2. Click **Add New**
3. Click **Upload Theme**
4. Upload the zip file that you downloaded
5. Activate the `ALPS for WordPress Child Theme`

## Theme settings

### Requirements
* The parent `ALPS for Wordpress` theme needs to be installed
* The parent theme folder needs to be labeled `alps-wordpress-v3`
* The child `ALPS for Wordpress Child` theme needs to be activated
* The child theme folder needs to be labeled `alps-wordpress-v3-child`

### Child Theme structure
Use this folder structure to override files in the parent theme.

```shell
themes/alps-wordpress-v3-child/
├── dist/
│   ├── images/
│   ├── scripts/
│   └── styles/
└── views/
    ├── layouts/
    └── patterns/
        ├── 00-atoms/
        │   ├── icons/
        │   └── logos/
        ├── 01-molecules/
        │   ├── blocks/
        │   ├── components/
        │   ├── forms/
        │   └── navigation/
        └── 02-organisms/
            ├── asides/
            ├── content/
            ├── global/
            └── sections/
```