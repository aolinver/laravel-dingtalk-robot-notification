<?php

namespace Calchen\LaravelDingtalkRobot\Message;

/**
 * link类型.
 *
 * Class LinkMessage
 */
class LinkMessage extends Message
{
    /**
     * LinkMessage constructor.
     *
     * @param string|null $title      消息标题
     * @param string|null $text       消息内容。如果太长只会部分展示
     * @param string|null $messageUrl 点击消息跳转的 URL
     * @param string      $picUrl     图片 URL
     */
    public function __construct(
        string $title = null,
        string $text = null,
        string $messageUrl = null,
        string $picUrl = ''
    ) {
        if (! is_null($title) && ! is_null($text) && ! is_null($messageUrl)) {
            $this->setMessage($title, $text, $messageUrl, $picUrl);
        }
    }

    /**
     * @param string $title      消息标题
     * @param string $text       消息内容。如果太长只会部分展示
     * @param string $messageUrl 点击消息跳转的 URL
     * @param string $picUrl     图片 URL
     * @param bool   $pcSlide    链接在钉钉侧栏打开，false则在浏览器打开
     *
     * @return LinkMessage
     */
    public function setMessage(string $title, string $text, string $messageUrl, string $picUrl = '', bool $pcSlide = true): self
    {
        $this->message = [
            'msgtype' => 'link',
            'link'    => [
                'title'      => $title,
                'text'       => $text,
                'picUrl'     => $this->getFinalUrl($picUrl, $pcSlide),
                'messageUrl' => $this->getFinalUrl($messageUrl, $pcSlide),
            ],
        ];

        return $this;
    }
}
