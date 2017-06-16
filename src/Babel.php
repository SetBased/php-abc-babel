<?php
//----------------------------------------------------------------------------------------------------------------------
namespace Nahouw;

/**
 * Abstract parent class for objects for retrieving linguistic entities in any language.
 */
abstract class Babel
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The instance of the Babel class.
   *
   * @var Babel
   */
  protected static $instance;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Object constructor.
   *
   * @since 1.0.0
   * @api
   */
  protected function __construct()
  {
    self::$instance = $this;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the concrete implementation of this class.
   *
   * @return Babel
   *
   * @since 1.0.0
   * @api
   */
  public static function getInstance()
  {
    return self::$instance;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the ID of the current default language.
   *
   * @return int
   *
   * @since 1.0.0
   * @api
   */
  abstract public function getLanId();

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a text in the default language.
   *
   * @param int $txtId The ID of the text.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  abstract public function getText($txtId);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a text in the default language using formatting (using
   * [vsprintf](http://php.net/manual/en/function.vsprintf.php)).
   *
   * @param int   $txtId The ID of the text.
   * @param array $args  The parameters for the format string.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  abstract public function getTextFormatted($txtId, $args);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a text in the default language in which substrings are replaced (using
   * [strtr](http://php.net/manual/en/function.strtr.php)).
   *
   * @param int   $txtId        The ID of the text.
   * @param array $replacePairs The replace pairs.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  abstract public function getTextReplaced($txtId, $replacePairs);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a word in the default language.
   *
   * @param int $wrdId The ID of the word.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  abstract public function getWord($wrdId);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Restores the previous default language as the current default language.
   *
   * @return void
   *
   * @since 1.0.0
   * @api
   */
  abstract public function popLanguage();

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Sets a new default language.
   *
   * @param int $lanId The ID of the new default language.
   *
   * @return void
   *
   * @since 1.0.0
   * @api
   */
  abstract public function pushLanguage($lanId);

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
