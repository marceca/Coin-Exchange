# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box = "scotch/box"
  config.vm.hostname = "scotchbox"
  config.vm.box_check_update = true
  config.vm.network "private_network", ip: "192.168.20.20"
  config.vm.network "forwarded_port", guest: 80, host: 8081
  # config.vm.synced_folder ".", "/var/www/public",id: "vagrant-root",
  #   owner: "vagrant",
  #   group: "www-data",
  #   mount_options: ["dmode=777,fmode=666"]
  config.vm.synced_folder ".", "/var/www/public", :nfs => { :mount_options => ["dmode=777","fmode=666"] }
  config.ssh.username = 'vagrant'
  config.ssh.password = 'vagrant'
  config.ssh.insert_key = 'true'
  config.vm.provider "virtualbox" do |v|
    cpus = `sysctl -n hw.ncpu`.to_i
    mem = `sysctl -n hw.memsize`.to_i / 1024 / 1024 / 4
    v.customize ["modifyvm", :id, "--memory", mem]
    v.customize ["modifyvm", :id, "--cpus", cpus]
    v.customize ["setextradata", :id, "VBoxInternal2/SharedFoldersEnableSymlinksCreate/vagrant", "1"]
  end
  config.ssh.shell = "bash -c 'BASH_ENV=/etc/profile exec bash'"
end
