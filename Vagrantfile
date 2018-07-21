Vagrant::DEFAULT_SERVER_URL.replace('https://vagrantcloud.com')
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  config.vm.box_check_update = false
  ENV['LC_ALL']="en_US.UTF-8"

  # For better network speed in VM
  config.vm.provider "virtualbox" do |v|
    v.memory = 2048
    v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    v.customize ["modifyvm", :id, "--natdnsproxy1", "on"]
  end

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  config.vm.network "private_network", ip: "192.168.33.10"

  config.vm.synced_folder "./", "/app",
    owner: "vagrant",
    group: "vagrant",
    mount_options: ["dmode=6775,fmode=6775"]

  if File.directory?(File.expand_path("./vendor"))
    config.vm.synced_folder "./vendor", "/app/vendor",
      owner: "vagrant",
      group: "vagrant",
      mount_options: ["dmode=6775,fmode=6775"]
  end
end
