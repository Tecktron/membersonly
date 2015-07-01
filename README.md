Members Only
==================
Extension to make your phpBB for members only

This phpbb 3.1.x extension will make it so that any non-logged in user will be redirected to the login page. This is done by means of core events, so there is no need to update templates or anything else.

## Install:
Place in your boards ext directory: 
    `[Your phpBB install dir]/ext/tecktron/membersonly`
    
Enable in your ACP:
    `"ACP" > "Customise" > "Extensions" > "Members Only" > "Enable"`

### Current Release Notes:
Keep in mind that this currently also blocks user registration.
For that I suggest the [Add User ACP Extenstion](https://github.com/phpbbmodders/phpBB-3.1-ext-adduser)

#### Version Info:
* 0.1.0 - Initial Release 

__Planned Enhancments:__
* Enable Registration links via ACP
