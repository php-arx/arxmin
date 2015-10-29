<?php namespace Arxmin;

class ModuleProvider
{
    private $type;

    private $url, $repo, $branch;

    private $api_key;

    private $user, $pass;

    /**
     * Constructor
     *
     * @api
     *
     * @param string $owner The owner of the repo that you want to download.
     * @param string $repo The repo name.
     * @param string $branch (optional) The branch to download. Default is `master`.
     * @param string $type (optional) Either `github` or `bitbucket`. Default is `github`.
     */
    public function __construct($owner, $repo, $branch = 'master', $type = 'github')
    {
        $this->type   = $type;
        $this->repo   = $repo;
        $this->branch = $branch;

        $url = ($type === 'github') ?
            'api.github.com/repos/%%owner%%/%%repo%%/zipball/%%branch%%'
            : 'bitbucket.org/%%owner%%/%%repo%%/get/%%branch%%.zip';

        $this->url =
            str_replace('%%branch%%', urlencode(strtolower($branch)),
                str_replace('%%repo%%', urlencode(strtolower($repo)),
                    str_replace('%%owner%%', urlencode(strtolower($owner)), $url)));
    }

    /**
     * @api
     */
    public function retrieve()
    {
        if($this->type === 'github')
            return $this->retrieve_github_file();
        else if($this->type === 'bitbucket')
            return $this->retrieve_bitbucket_file();
        else
            throw new \exception('Unexpected Repo type: '.$this->type);
    }

    /**
     * @api
     */
    public function serve()
    {
        if($this->type === 'github')
            $this->serve_github_file();
        else if($this->type === 'bitbucket')
            $this->serve_bitbucket_file();
        else
            throw new \exception('Unexpected Repo type: '.$this->type);
    }

    /**
     * Authenticate for Private Repos
     *
     * @api
     *
     * @param string $au Either a GitHub Peronal Access Token, or GitHub/Bitbucket Username.
     * @param string $pass (optional) User password. If this is set the function assumes that `$au` is a Username.
     *
     * @return bool
     */
    public function authenticate($au, $pass = '')
    {
        if($pass)
        { // If `$pass` is specified, we're dealing with Username + Password
            $this->user = strtolower($au);
            $this->pass = $pass;
        }
        else if($this->type === 'github')
            $this->api_key = $au;
    }

    /* Private Functions */

    private function serve_github_file()
    {
        $headers = array();
        if($this->api_key) $headers[] = 'Authorization: token '.$this->api_key;

        // Sets up username/password authentication, too
        $res = $this->remote(
            'https://'.(($this->pass) ? $this->user.':'.$this->pass.'@' : '').$this->url,
            array(
                'headers'     => $headers,
                'user-agent'  => apply_filters(
                    'wsc_github_user_agent',
                    'WebSharks Core Private Download Handler on '.get_bloginfo('name'),
                    get_defined_vars()
                ),
                'redirection' => 0, // Redirection needs to be set to 0 so we can grab the HTTP Location header
            )
        );

        if($res['response_code'] !== 302)
            throw new \exception('Unexpected GitHub API error! '.$this->url);

        wp_redirect($res['headers']['location']);
        exit();
    }

    private function serve_bitbucket_file()
    {
        header('Content-Type: application/zip; charset=utf-8');
        // This is needed so that we download the file as a .zip, and not as .php.
        header('Content-Disposition: attachment; filename="'.$this->repo.'-'.$this->branch.'"');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://'.$this->url);
        curl_setopt($ch, CURLOPT_BUFFERSIZE, 2048);
        curl_setopt($ch, CURLOPT_USERPWD, $this->user.':'.$this->pass);
        curl_exec($ch);
        curl_close($ch);
        exit();
    }

    private function retrieve_github_file()
    {
        $headers = array();
        if($this->api_key) $headers[] = 'Authorization: token '.$this->api_key;

        // Sets up username/password authentication, too
        return $this->remote(
            'https://'.(($this->pass) ? $this->user.':'.$this->pass.'@' : '').$this->url,
            array(
                'headers'    => $headers,
                'user-agent' => apply_filters(
                    'wsc_github_user_agent',
                    'WebSharks Core Private Download Handler on '.get_bloginfo('name'),
                    get_defined_vars()
                ),
                'timeout'    => 60, // 60 Second timeout
            )
        );
    }

    private function retrieve_bitbucket_file()
    {
        // Sets up username/password authentication, too
        return $this->remote(
            'https://'.(($this->pass) ? $this->user.':'.$this->pass.'@' : '').$this->url,
            array(
                'timeout' => 60, // 60 Second timeout
            )
        );
    }

    private function remote($url, $args)
    {
        if(!defined('WPINC'))
            throw new \exception('WordPress dependency missing.');

        $request       = wp_remote_request($url, $args);
        $body          = wp_remote_retrieve_body($request);
        $headers       = wp_remote_retrieve_headers($request);
        $response_code = wp_remote_retrieve_response_code($request);

        return get_defined_vars();
    }
}