<?php
/**
 * @author bai <ghimping@alpstein.my>
 * @link https://www.alpstein.my
 * @copyright Copyright (c) Alpstein Software
 *           _____                    _____                    _____
 *          /\    \                  /\    \                  /\    \
 *         /::\    \                /::\    \                /::\    \
 *        /::::\    \              /::::\    \               \:::\    \
 *       /::::::\    \            /::::::\    \               \:::\    \
 *      /:::/\:::\    \          /:::/\:::\    \               \:::\    \
 *     /:::/__\:::\    \        /:::/__\:::\    \               \:::\    \
 *    /::::\   \:::\    \      /::::\   \:::\    \              /::::\    \
 *   /::::::\   \:::\    \    /::::::\   \:::\    \    ____    /::::::\    \
 *  /:::/\:::\   \:::\ ___\  /:::/\:::\   \:::\    \  /\   \  /:::/\:::\    \
 * /:::/__\:::\   \:::|    |/:::/  \:::\   \:::\____\/::\   \/:::/  \:::\____\
 * \:::\   \:::\  /:::|____|\::/    \:::\  /:::/    /\:::\  /:::/    \::/    /
 *  \:::\   \:::\/:::/    /  \/____/ \:::\/:::/    /  \:::\/:::/    / \/____/
 *   \:::\   \::::::/    /            \::::::/    /    \::::::/    /
 *    \:::\   \::::/    /              \::::/    /      \::::/____/
 *     \:::\  /:::/    /               /:::/    /        \:::\    \
 *      \:::\/:::/    /               /:::/    /          \:::\    \
 *       \::::::/    /               /:::/    /            \:::\    \
 *        \::::/    /               /:::/    /              \:::\____\
 *         \::/____/                \::/    /                \::/    /
 *          ~~                       \/____/                  \/____/
 */

namespace App\Models\Enums;

/**
 * Class ClientStatus
 * @package App\Models\Enums
 */
class ClientStatus extends Base
{
    const QUEUEING = 'Queueing';
    const CREATING = 'Creating';
    const CREATED = 'Created';
    const PROCESSING = 'Processing';
    const ACTIVE = 'Active';
    const EXPIRED = 'Expired';
    const ERROR = 'Error';

    /**
     * @return array
     */
    public static function options()
    {
        return [
            self::QUEUEING => 'Queueing',
            self::CREATING => 'Creating',
            self::CREATED => 'Created',
            self::PROCESSING => 'Processing',
            self::ACTIVE => 'Active',
            self::EXPIRED => 'EXPIRED',
            self::ERROR => 'Error',
        ];
    }
}