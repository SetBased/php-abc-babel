<?php
declare(strict_types=1);

namespace Plaisio\Babel;

/**
 * Interface for retrieving linguistic entities in any language.
 *
 * @property-read int $lanId the ID of the current language.
 */
interface Babel
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Completely style date format specifier (Sunday, April 10, 1966).
   */
  const FORMAT_FULL = 1;

  /**
   * Long style date format specifier (April 10, 1966).
   */
  const FORMAT_LONG = 2;

  /**
   * Medium style date format specifier (Apr 10, 1966).
   */
  const FORMAT_MEDIUM = 3;

  /**
   * Short style date format specifier (04/10/1966).
   */
  const FORMAT_SHORT = 4;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the direction of the current language. See [dir](https://www.w3schools.com/tags/att_global_dir.asp)
   * attribute.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getDir(): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a date formatted according to a date format specifier.
   *
   * @param int                   $dateType The date format specifier. One of:
   *                                        <ul>
   *                                        <li>Babel::FORMAT_FULL
   *                                        <li>Babel::FORMAT_LONG
   *                                        <li>Babel::FORMAT_MEDIUM
   *                                        <li>Babel::FORMAT_SHORT
   *                                        </ul>
   * @param string|\DateTime|null $date     The date.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getFormattedDate(int $dateType, $date): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a text in the current language with special characters converted to HTML entities.
   *
   * @param int $txtId The ID of the text.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getHtmlText(int $txtId): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a text in the current language using formatting (using
   * [vsprintf](http://php.net/manual/en/function.vsprintf.php)) with special characters converted to HTML entities.
   *
   * @param int   $txtId        The ID of the text.
   * @param bool  $formatIsHtml If true the format is valid HTML code with special characters converted to HTML
   *                            entities. Otherwise, the format is plain text and special characters will be converted
   *                            to HTML entities.
   * @param bool  $argsAreHtml  If true the arguments are valid HTML code with special characters converted to HTML
   *                            entities. Otherwise, the arguments are plain text and special characters will be
   *                            converted to HTML entities.
   * @param array $args         The parameters for the format string.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getHtmlTextFormatted(int $txtId, bool $formatIsHtml, bool $argsAreHtml, array $args): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a text in the current language in which substrings are replaced (using
   * [strtr](http://php.net/manual/en/function.strtr.php)) with special characters converted to HTML entities.
   *
   * @param int   $txtId        The ID of the text.
   * @param bool  $formatIsHtml If true the text is valid HTML code with special characters converted to HTML
   *                            entities. Otherwise, the text is plain text and special characters will be converted
   *                            to HTML entities.
   * @param bool  $argsAreHtml  If true the replace values are valid HTML code with special characters converted to HTML
   *                            entities. Otherwise, the replace values are plain text and special characters will be
   *                            converted to HTML entities.
   * @param array $replacePairs The parameters for the format string.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getHtmlTextReplaced(int $txtId, bool $formatIsHtml, bool $argsAreHtml, array $replacePairs): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a word in the current language with special characters converted to HTML entities.
   *
   * @param int $wrdId The ID of the word.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getHtmlWord(int $wrdId): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the internal language code of the current language.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getInternalCode(): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a map from internal language code to the ID of the language for all available languages. In other words
   * returns an array of which keys are internal language codes and the values are the ID of the corresponding
   * language.
   *
   * @return array
   */
  public function getInternalLanguageMap(): array;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the ISO 639-1 language code of the current language. See
   * [lang](https://www.w3schools.com/tags/ref_language_codes.asp) attribute.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getLang(): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the locale suitable for PHP [setlocale](http://php.net/manual/en/function.setlocale.php) of the current
   * language.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getLocale(): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a text in the current language.
   *
   * @param int $txtId The ID of the text.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getText(int $txtId): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a text in the current language using formatting (using
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
  public function getTextFormatted(int $txtId, array $args): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a text in the current language in which substrings are replaced (using
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
  public function getTextReplaced(int $txtId, array $replacePairs): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a word in the current language.
   *
   * @param int $wrdId The ID of the word.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getWord(int $wrdId): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Restores the previous language as the current language.
   *
   * @return void
   *
   * @since 1.0.0
   * @api
   */
  public function popLanguage(): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Sets and pushes a new current language.
   *
   * @param int $lanId The ID of the new current language.
   *
   * @return void
   *
   * @since 1.0.0
   * @api
   */
  public function pushLanguage(int $lanId): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Replace the current language with a new language.
   *
   * @param int $lanId The ID of the new language.
   *
   * @return void
   *
   * @since 1.0.0
   * @api
   */
  public function setLanguage(int $lanId): void;

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
