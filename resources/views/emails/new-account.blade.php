@extends('layouts.emails')

    @section('image')
        <img align="center" border="0" src="{{ asset('email-assets/images/image-5.png') }}" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 10%;max-width: 58px;" width="58"/>
    @endsection

    @section('title')
        <div style="line-height: 140%; text-align: left; word-wrap: break-word;">
            <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-size: 28px; line-height: 39.2px; color: #ffffff; font-family: Lato, sans-serif;">Account Details</span></p>
        </div>
    @endsection

    @section('body')
        <div style="line-height: 140%; text-align: left; word-wrap: break-word;">
            <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 18px; line-height: 25.2px; color: #666666;">Hello,</span></p>
            <p style="font-size: 14px; line-height: 140%;">&nbsp;</p>
            <p style="font-size: 14px; line-height: 140%;">
                <span style="color: #666666; font-size: 18px; line-height: 25.2px;">
                    Your employee account has been setup successfully.
                    Your account details are as follows:
                    Email: {{ $this->email }}
                    password: Pass2022
                    You must change your password uponlogin to proceed.
                </span>
            </p>
            <p style="font-size: 14px; line-height: 140%;">&nbsp;</p>
        </div>
    @endsection

    @section('cta')
        <a href="{{ route('login') }}" target="_blank" style="box-sizing: border-box;display: inline-block;font-family:'Lato',sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #B56576; border-radius: 1px;-webkit-border-radius: 1px; -moz-border-radius: 1px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
            <span style="display:block;padding:15px 40px;line-height:120%;">
                <span style="font-size: 18px; line-height: 21.6px;">Complete setup</span>
            </span>
        </a>
    @endsection

    @section('extra')
        <div style="line-height: 140%; text-align: left; word-wrap: break-word;">
            <p style="font-size: 14px; line-height: 140%;">
                <span style="color: #888888; font-size: 14px; line-height: 19.6px;">
                    <em>
                        <span style="font-size: 16px; line-height: 22.4px;">You can also <span style="font-size: 16px; line-height: 22.4px;">
                            <span style="color: #B56576; font-size: 16px; line-height: 22.4px; text-decoration: underline;">
                                <a rel="noopener" href="{{ route('login') }}" target="_blank" style="color: #B56576; text-decoration: underline;">
                                    click here to complete your profile
                                    <span style="font-size: 16px; line-height: 22.4px;"></span>
                                    &rarr;
                                    </a>
                                </span>
                            </span>
                        </span>
                    </em>
                </span>
                <br />
                <span style="color: #888888; font-size: 14px; line-height: 19.6px;">
                    <em>
                        <span style="font-size: 16px; line-height: 22.4px;">&nbsp;</span>
                    </em>
                </span>
            </p>
            {{--  <p style="font-size: 14px; line-height: 140%;"><span style="color: #888888; font-size: 14px; line-height: 19.6px;"><em><span style="font-size: 16px; line-height: 22.4px;">If you didn't initiate this, you can ignore this email. <span style="font-size: 16px; line-height: 22.4px;"><span style="color: #B56576; font-size: 16px; line-height: 22.4px; text-decoration: underline;"></span></span></span></em></span><br /><span style="color: #888888; font-size: 14px; line-height: 19.6px;"><em><span style="font-size: 16px; line-height: 22.4px;">&nbsp;</span></em></span></p>  --}}
        </div>
    @endsection
