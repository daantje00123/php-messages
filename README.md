# PHP Messages

This library can be used to show messages to the front-end user.

## Usage

Content:

- [Get `MessageHelper` instance](#get-instance)
- [Add error message](#add-error)
- [Add warning message](#add-warning)
- [Add info message](#add-info)
- [Add success message](#add-success)
- [Set error message template](#set-error-template)
- [Set warning message template](#set-warning-template)
- [Set info message template](#set-info-template)
- [Set success message template](#set-success-template)
- [Get messages HTML output](#get-html)

The following types of messages are supported:

- Error
- Warning
- Info
- Success

### <a name="get-instance"></a>Get `MessageHelper` instance

To get the `MessageHelper` instance use:

```php
$messageHelper = \DvbPhpMessages\MessageHelper::getInstance();
```

### <a name="add-error"></a>Add error message

To add an error message use:

```php
// Get instance
$messageHelper = \DvbPhpMessages\MessageHelper::getInstance();

// Add error message
$messageHelper->addError("This is an error message");
```

### <a name="add-warning"></a>Add warning message

To add a warning message use:

```php
// Get instance
$messageHelper = \DvbPhpMessages\MessageHelper::getInstance();

// Add warning message
$messageHelper->addWarning("This is a warning message");
```

### <a name="add-info"></a>Add info message

To add an info message use:

```php
// Get instance
$messageHelper = \DvbPhpMessages\MessageHelper::getInstance();

// Add info message
$messageHelper->addInfo("This is an info message");
```

### <a name="add-success"></a>Add success message

To add a success message use:

```php
// Get instance
$messageHelper = \DvbPhpMessages\MessageHelper::getInstance();

// Add success message
$messageHelper->addSuccess("This is a success message");
```

### <a name="set-error-template"></a>Set error message template

To set the error message HTML template use:

```php
// Get instance
$messageHelper = \DvbPhpMessages\MessageHelper::getInstance();

// Set error template
$messageHelper->setErrorTemplate('<div class="error-message">%s</div>');
```

### <a name="set-warning-template"></a>Set warning message template

To set the warning message HTML template use:

```php
// Get instance
$messageHelper = \DvbPhpMessages\MessageHelper::getInstance();

// Set error template
$messageHelper->setWarningTemplate('<div class="warning-message">%s</div>');
```

### <a name="set-info-template"></a>Set info message template

To set the info message HTML template use:

```php
// Get instance
$messageHelper = \DvbPhpMessages\MessageHelper::getInstance();

// Set error template
$messageHelper->setInfoTemplate('<div class="info-message">%s</div>');
```

### <a name="set-success-template"></a>Set success message template

To set the success message HTML template use:

```php
// Get instance
$messageHelper = \DvbPhpMessages\MessageHelper::getInstance();

// Set error template
$messageHelper->setSuccessTemplate('<div class="success-message">%s</div>');
```

### <a name="get-html"></a>Get messages HTML output

To get the messages HTML output and show the message on screen use:

```php
// Get instance
$messageHelper = \DvbPhpMessages\MessageHelper::getInstance();

// Show messages to user
echo $messageHelper->getMessagesHTML();
```