const ftp = require("basic-ftp");
require('dotenv').config();
const { join } = require('path');

const { emptyDirSync } = require('fs-extra');

const localCockpitRoot = '../cockpit';

async function downloadDir(client, path){
    const localPath = join(localCockpitRoot, path);
    const remotePath = `/cockpit/${path}`;
    console.log("downloading remote path", remotePath, " to local path", localPath);
    
    emptyDirSync(localPath);
    await client.downloadToDir(localPath, remotePath);
}

async function printPwd(client){
    const pwdStr = await client.pwd();
    console.log("pwd", pwdStr);
}

async function pull() {
    const client = new ftp.Client()

    try{
        await client.access({
            host: process.env.FTP_HOST,
            user: process.env.FTP_USER,
            password: process.env.FTP_PASSWORD,
            secure: true
        });

        await client.cd("cockpit");

        await downloadDir(client, 'storage/collections');
        await downloadDir(client, 'storage/singleton');
        await printPwd(client);

        client.close();
    }catch(e){
        console.error(e);
        process.exit(1);
    }

    console.log("download completed successfully");
}


pull();