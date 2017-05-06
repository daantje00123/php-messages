<?php
namespace DvbPhpMessages;

class MessageHelper {
	/**
	 * Message that needs to be shown to the user
	 *
	 * @var array
	 */
	private $messages = array(
		"errors"   => array(),
		"warnings" => array(),
		"info"     => array(),
		"success"  => array()
	);

	/**
	 * Template for error message
	 *
	 * @var string
	 */
	private $error_template = '<div class="alert alert-danger">%s</div>';

	/**
	 * Template for warning message
	 *
	 * @var string
	 */
	private $warning_template = '<div class="alert alert-warning">%s</div>';

	/**
	 * Template for info message
	 *
	 * @var string
	 */
	private $info_template = '<div class="alert alert-info">%s</div>';

	/**
	 * Template for success message
	 *
	 * @var string
	 */
	private $success_template = '<div class="alert alert-success">%s</div>';

	/**
	 * @var \DvbPhpMessages\MessageHelper
	 */
	private static $instance;

	/**
	 * MessageHelper constructor.
	 *
	 * This constructor is private to prevent creating multiple instances (singleton)
	 */
	private function __construct() {
		// Start session if not already started
		if (!session_id()) {
			session_start();
		}

		// Load messages from session
		if (isset($_SESSION['messages']) && is_array($_SESSION['messages'])) {
			$this->messages = $_SESSION['messages'];

			if (!isset($this->messages['errors'])) $this->messages['errors'] = array();
			if (!isset($this->messages['warnings'])) $this->messages['warnings'] = array();
			if (!isset($this->messages['info'])) $this->messages['info'] = array();
			if (!isset($this->messages['success'])) $this->messages['success'] = array();
		}
	}

	/**
	 * Add error message
	 *
	 * @param string|\Exception $error
	 *
	 * @return void
	 */
	public function addError($error) {
		if ($error instanceof \Exception) {
			$error = $error->getMessage();
		}

		$this->messages['errors'][] = $error;
		$this->saveSession();
	}

	/**
	 * Add warning message
	 *
	 * @param string $warning
	 *
	 * @return void
	 */
	public function addWarning(string $warning) {
		$this->messages['warnings'][] = $warning;
		$this->saveSession();
	}

	/**
	 * Add info message
	 *
	 * @param string $info
	 *
	 * @return void
	 */
	public function addInfo(string $info) {
		$this->messages['info'][] = $info;
		$this->saveSession();
	}

	/**
	 * Add success message
	 *
	 * @param string $success
	 *
	 * @return void
	 */
	public function addSuccess(string $success) {
		$this->messages['success'][] = $success;
		$this->saveSession();
	}

	/**
	 * Set error message template
	 *
	 * @param string $template
	 */
	public function setErrorTemplate(string $template) {
		$this->error_template = $template;
	}

	/**
	 * Set warning message template
	 *
	 * @param string $template
	 */
	public function setWarningTemplate(string $template) {
		$this->warning_template = $template;
	}

	/**
	 * Set info message template
	 *
	 * @param string $template
	 */
	public function setInfoTemplate(string $template) {
		$this->info_template = $template;
	}

	/**
	 * Set success message template
	 *
	 * @param string $template
	 */
	public function setSuccessTemplate(string $template) {
		$this->success_template = $template;
	}

	/**
	 * @return string
	 */
	public function getMessagesHTML(): string {
		$output = '';

		// Add error messages to output
		if (!empty($this->messages['errors'])) {
			foreach ($this->messages['errors'] as $key => $error) {
				$output .= sprintf($this->error_template, $error);
				unset($this->messages['errors'][$key]);
			}
		}

		// Add warning messages to output
		if (!empty($this->messages['warnings'])) {
			foreach ($this->messages['warnings'] as $key => $warning) {
				$output .= sprintf($this->warning_template, $warning);
				unset($this->messages['warnings'][$key]);
			}
		}

		// Add info messages to output
		if (!empty($this->messages['info'])) {
			foreach ($this->messages['info'] as $key => $info) {
				$output .= sprintf($this->info_template, $info);
				unset($this->messages['info'][$key]);
			}
		}

		// Add success messages to output
		if (!empty($this->messages['success'])) {
			foreach ($this->messages['success'] as $key => $success) {
				$output .= sprintf($this->success_template, $success);
				unset($this->messages['success'][$key]);
			}
		}

		$this->saveSession();

		return $output;
	}

	/**
	 * Save the messages that need to be showed in the session
	 */
	private function saveSession() {
		$_SESSION['messages'] = $this->messages;
	}

	/**
	 * Get the MessageHelper instance (singleton)
	 *
	 * @return \DvbPhpMessages\MessageHelper
	 */
	public static function getInstance(): MessageHelper {
		if (empty(self::$instance)) {
			self::$instance = new MessageHelper();
		}

		return self::$instance;
	}
}