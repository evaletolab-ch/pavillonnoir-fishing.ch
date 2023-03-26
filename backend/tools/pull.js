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
    // client.ftp.verbose = true;

    // client.trackProgress(info => {
    //     console.log("File", info.name)
    //     console.log("Type", info.type)
    //     console.log("Transferred", info.bytes)
    //     console.log("Transferred Overall", info.bytesOverall)
    // });

    try{
        await client.access({
            host: process.env.FTP_HOST,
            user: process.env.FTP_USER,
            password: process.env.FTP_PASSWORD,
            secure: true
        });

        await client.cd("cockpit");

        await downloadDir(client, 'storage/data');
        await downloadDir(client, 'storage/thumbs');
        await downloadDir(client, 'storage/uploads');
        await printPwd(client);

        client.close();
    }catch(e){
        console.error(e);
        process.exit(1);
    }

    console.log("download completed successfully");
}


pull();